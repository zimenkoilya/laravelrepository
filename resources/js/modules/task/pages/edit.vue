<template>
  <b-card v-if="task" no-body class="mb-4">
    <b-card-header class="with-elements">
      <span class="card-header-title mr-2">Create Task</span>
      <div class="card-header-elements ml-md-auto">
        <b-link :to="{ name: 'task.list' }" class="btn btn-sm btn-outline-secondary ml-2">
          <span class="ion ion-ios-arrow-back"></span> Back
        </b-link>
      </div>
    </b-card-header>
    <b-card-body>
      <b-form @submit.prevent="update">
        <b-form-row>
          <b-form-group label="Template" class="col-md-3">
            <b-form-select v-model="task.task_template_id">
              <option value="0">Select a template</option>
              <option v-for="template in templates" :key="template.id" :value="template.id">
                {{ template.name }}
              </option>
            </b-form-select>
          </b-form-group>
          <b-form-group label="Title" class="col-md-6">
            <b-input v-model="task.title" placeholder="Title" />
          </b-form-group>
          <b-form-group label="Case ID" class="col-md-3">
            <b-input v-model="task.case_id" placeholder="Case ID" />
          </b-form-group>
        </b-form-row>
        <b-form-group label="Description">
          <b-textarea v-model="task.description" rows="4" />
        </b-form-group>
        <b-form-row>
          <b-form-group label="Due Date" class="col-md-4">
            <b-form-datepicker v-model="task.due_date" />
          </b-form-group>
          <b-form-group label="Status" class="col-md-4">
            <b-form-select v-model="task.status">
              <option value="pending">Pending</option>
              <option value="complete">Complete</option>
              <option value="overdue">Overdue</option>
            </b-form-select>
          </b-form-group>
          <b-form-group label="Assigned To" class="col-md-4">
            <b-form-select v-model="task.assigned_user_id">
              <option value="0">None</option>
              <option v-for="user in users" :key="user.id" :value="user.id">
                {{ user.name }}
              </option>
            </b-form-select>
          </b-form-group>
        </b-form-row>
        <b-btn type="submit" variant="primary">Update</b-btn>
      </b-form>
    </b-card-body>
  </b-card>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'task-edit',

  metaInfo: {
    title: 'Task'
  },

  data: () => ({
    task: null
  }),

  computed: {
    ...mapGetters({
      templates: 'task/templates',
      users: 'task/users',
    })
  },

  async created () {
    await this.$store.dispatch('task/fetchTemplates')
    await this.$store.dispatch('task/fetchUsers')
    this.task = await this.$store.dispatch('task/fetchTask', { id: this.$route.params.id })
  },

  methods: {
    async create () {
      await this.$store.dispatch('task/createTask', this.task)
    },

    async update () {
      await this.$store.dispatch('task/updateTask', this.task)
      this.$router.push({ name: 'task.list' })
    }
  }
}
</script>