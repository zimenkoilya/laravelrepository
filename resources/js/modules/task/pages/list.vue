<template>
  <div>
    <b-card no-body class="mb-3">
      <b-card-header class="with-elements">
        <span class="card-header-title mr-2">Tasks</span>
        <div class="card-header-elements">
          <b-button variant="outline-primary" size="sm" v-b-modal.filter-options-modal class="ml-2">
            Filter Options
          </b-button>
          <b-button variant="outline-primary" size="sm" v-b-modal.filter-save-modal class="ml-2">
            Save Filter As
          </b-button>
          <b-button variant="outline-primary" size="sm" v-b-modal.saved-filters-modal class="ml-2">
            Saved Filters
          </b-button>
        </div>
        <div class="card-header-elements ml-md-auto">
          <span class="badge badge-info">{{ totalItems }} Total Tasks</span>
          <span class="badge badge-primary">{{ count.pending }} Pending</span>
          <span class="badge badge-success">{{ count.complete }} Complete</span>
          <span class="badge badge-secondary">{{ count.overdue }} Overdue</span>
          <b-link :to="{ name: 'task.create' }" class="btn btn-sm btn-outline-primary ml-2">
            <span class="ion ion-md-add"></span> Add
          </b-link>
        </div>
      </b-card-header>
      <b-card-body>
        <div>
          <!-- Table controls -->
          <div class="row">
            <div class="col">
              <b-form-group>
                Per page: &nbsp;
                <b-select size="sm" :options="perPageOptions" v-model="perPage" class="d-inline-block w-auto" />
              </b-form-group>
            </div>
          </div>
          <!-- Table -->
          <div class="table-responsive">
            <b-table
              :items="tasks"
              :fields="columns"
              :striped="true"
              :hover="true"
              :current-page="currentPage"
              :per-page="0">
              <!-- <template #cell(selected)="row">
                <b-form-group class="m-0">
                  <input type="checkbox" v-model="row.item.selected" />
                </b-form-group>
              </template> -->
              <template #cell(status)="row">
                <span :class="`badge badge-${ row.item.status == 'complete' ? 'success' : row.item.status == 'pending' ? 'primary' : 'warning'}`">
                  {{ row.item.status }}
                </span>
              </template>
              <template #cell(completed_at)="row">
                <span v-if="row.item.completed_at">{{ row.item.completed_at }}</span>
                <b-btn v-else class="btn btn-sm btn-default" @click="completeTask(row.item.id)">Complete Task</b-btn>
              </template>
              <template #cell(action)="row">
                <b-btn size="sm" @click="row.toggleDetails" class="mr-1" variant="success">Description</b-btn>
                <b-link class="btn btn-sm btn-primary mr-1" :to="`/task/edit/${row.item.id}`">Edit</b-link>
                <b-btn size="sm" class="mr-1" variant="danger" @click="deleteTask(row.item.id)">Delete</b-btn>
              </template>
              <template #row-details="row">
                <div>{{ row.item.description }}</div>
              </template>
            </b-table>
          </div>
          <!-- Pagination -->
          <div class="row">
            <div class="col-sm text-sm-left text-center mb-3 mb-sm-0">
              <span class="text-muted" v-if="totalPages">Page {{ currentPage }} of {{ totalPages }}</span>
            </div>
            <div class="col-sm">
              <b-pagination class="justify-content-center justify-content-sm-end"
                v-if="totalItems"
                v-model="currentPage"
                :total-rows="totalItems"
                :per-page="perPage"
                size="sm" />
            </div>
          </div>
        </div>
      </b-card-body>
    </b-card>
    <filter-options id="filter-options-modal" :filter="filterTasks" :options="filter"></filter-options>
    <filter-save id="filter-save-modal" :saveFilter="saveFilter"></filter-save>
    <saved-filters id="saved-filters-modal" :filters="filters" :setFilter="setFilter" :deleteFilter="deleteFilter"></saved-filters>
  </div>
</template>

<style scoped>
.badge {
  padding: 0.5em 0.6em;
}
</style>

<script>
import Swal from 'sweetalert2'
import { mapGetters } from 'vuex'
import FilterOptions from '../modals/FilterOptions'
import FilterSave from '../modals/FilterSave'
import SavedFilters from '../modals/SavedFilters'

export default {
  name: 'task-list',

  metaInfo: {
    title: 'Task'
  },

  components: {
    'filter-save': FilterSave,
    'filter-options': FilterOptions,
    'saved-filters': SavedFilters
  },

  data: () => ({
    filter: {
      case_id: null,
      status: 'any',
      due_date_from: null,
      due_date_to: null,
      assigned_at_from: null,
      assigned_at_to: null,
      completed_at_from: null,
      completed_at_to: null,
    },
    perPageOptions: [10, 20, 30, 40, 50],
    perPage: 10,
    currentPage: 1,
    columns: [
      { key: 'selected', label: '#' },
      { key: 'title', sortable: true },
      { key: 'assigned_user_id', label: 'Contact', sortable: true },
      { key: 'status', sortable: true },
      { key: 'due_date', label: 'Due', sortable: true },
      { key: 'assigned_at', sortable: true },
      { key: 'created_at', label: 'Created Date', sortable: true },
      { key: 'created_by', sortable: true },
      { key: 'completed_at', label: 'Completed Date', sortable: true },
      { key: 'action' },
    ]
  }),

  computed: {
    ...mapGetters({
      tasks: 'task/tasks',
      count: 'task/count',
      filters: 'task/filters',
    }),
    totalItems () {
      return this.count.pending + this.count.complete + this.count.overdue
    },
    totalPages () {
      return Math.ceil(this.totalItems / this.perPage)
    }
  },

  async mounted () {
    await this.$store.dispatch('task/fetchFilters');
    await this.paginate();
  },

  methods: {
    async paginate () {
      await this.$store.dispatch('task/fetchTasks', {
        page: this.currentPage,
        per_page: this.perPage,
        ...this.filter
      })
    },

    async deleteTask (id) {
      const result = await Swal.fire({
        icon: 'error',
        text: 'Are you sure to delete this task?',
        showCancelButton: true,
      })
      if (result.value) {
        this.$store.dispatch('task/deleteTask', { id })
      }
    },

    async completeTask (id) {
      const result = await Swal.fire({
        icon: 'error',
        text: 'Are you sure to complete this task?',
        showCancelButton: true,
      })
      if (result.value) {
        await this.$store.dispatch('task/completeTask', { id })
      }
    },

    async filterTasks () {
      await this.paginate()
    },

    async saveFilter (name) {
      await this.$store.dispatch('task/saveFilter', {
        name,
        filters: this.filter
      })
    },

    async setFilter (id) {
      const savedFilter = this.filters.find(f => f.id == id)
      this.filter = JSON.parse(savedFilter.filters)
      await this.filterTasks()
    },

    async deleteFilter (id) {
      await this.$store.dispatch('task/deleteFilter', { id })
    }
  },

  watch: {
    currentPage: {
      handler: async function () {
        await this.paginate()
      }
    },
    perPage: {
      handler: async function () {
        await this.paginate()
      }
    }
  }
}
</script>
