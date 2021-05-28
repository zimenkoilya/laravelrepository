<template>
  <b-card no-body class="mb-4">
    <b-card-header class="with-elements">
      <span class="card-header-title mr-2">Create Task</span>
      <div class="card-header-elements ml-md-auto">
        <b-link :to="{ name: 'task.list' }" class="btn btn-sm btn-outline-secondary ml-2">
          <span class="ion ion-ios-arrow-back"></span> Back
        </b-link>
      </div>
    </b-card-header>
    <b-card-body>
      <b-form @submit.prevent="create">
        <b-form-row>
          <b-form-group label="Template" class="col-md-3">
            <b-form-select v-model="task.task_template_id" @change="changeTemplate">
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
          <b-form-group label="Assigned To" class="col-md-4">
            <b-form-select v-model="task.assigned_user_id">
              <option value="0">None</option>
              <option v-for="user in users" :key="user.id" :value="user.id">
                {{ user.display_name }}
              </option>
            </b-form-select>
          </b-form-group>
        </b-form-row>
        <b-btn type="submit" variant="primary">Create</b-btn>
      </b-form>
    </b-card-body>
  </b-card>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'task-create',

  metaInfo: {
    title: 'Task'
  },

  data: () => ({
    task: {
      task_template_id: 0,
      title: '',
      case_id: '',
      description: '',
      due_date: '',
      assigned_user_id: 0
    }
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
  },

  methods: {
    async create () {
      await this.$store.dispatch('task/createTask', this.task)
      this.$router.push({ name: 'task.list' })
    },

    changeTemplate () {
      const template = this.templates.find(t => t.id == this.task.task_template_id)
      this.task.description = template ? template.instruction : ''
      this.task.title = template ? template.name : ''
    }
  }
}
</script>