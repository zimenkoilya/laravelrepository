import axios from 'axios'
import * as types from './mutation-types'

// state
export const state = {
  count: {
    total: 0,
    pending: 0,
    complete: 0,
    overdue: 0
  },
  tasks: [],
  templates: [],
  users: [],
  filters: []
}

// getters
export const getters = {
  count: state => state.count,
  tasks: state => state.tasks,
  task: state => state.task,
  templates: state => state.templates,
  filters: state => state.filters
}

// mutations
export const mutations = {
  [types.FETCH_TASKS] (state, { tasks, count }) {
    state.tasks = tasks
    state.count = count
  },

  [types.CREATE_TASK] (state, { task }) {
    state.tasks.push(task)
  },

  [types.UPDATE_TASK] (state, { task }) {
    const index = state.tasks.findIndex(t => t.id == task.id)
    state.tasks[index] = task
  },

  [types.DELETE_TASK] (state, id) {
    const index = state.tasks.findIndex(task => task.id == id)
    state.tasks.splice(index, 1)
  },

  [types.FETCH_TEMPLATES] (state, { templates }) {
    state.templates = templates
  },

  [types.FETCH_USERS] (state, { users }) {
    state.users = users
  },

  [types.FETCH_FILTERS] (state, { filters }) {
    state.filters = filters.data
  },

  [types.SAVE_FILTER] (state, { filter }) {
    state.filters.push(filter)
  },

  [types.DELETE_FILTER] (state, id) {
    const index = state.filters.findIndex(filter => filter.id == id)
    state.filters.splice(index, 1)
  }
}

// actions
export const actions = {
  async fetchTasks ({ commit }, filter) {
    try {
      let url = '/api/tasks?'
      let searchParams = []
      for (const param in filter) {
        if (filter[param]) {
          searchParams.push(`${param}=${encodeURIComponent(filter[param])}`)
        }
      }
      url = url + searchParams.join('&')
      const { data } = await axios.get(url)

      commit(types.FETCH_TASKS, data)
    } catch (e) {
      console.log(e)
      return []
    }
  },

  async fetchTask ({ commit }, { id }) {
    try {
      const { data } = await axios.get(`/api/tasks/${id}`)

      return data
    } catch (e) {
      return null
    }
  },

  async createTask ({ commit }, payload) {
    try {
      const { data } = await axios.post('/api/tasks', payload)

      commit(types.CREATE_TASK, { task: data })
    } catch (e) {}
  },

  async updateTask ({ commit }, payload) {
    try {
      const { id } = payload;
      const { data } = await axios.put(`/api/tasks/${id}`, payload)

      commit(types.UPDATE_TASK, { task: data })
    } catch (e) {}
  },

  async deleteTask ({ commit }, { id }) {
    try {
      await axios.delete(`/api/tasks/${id}`)

      commit(types.DELETE_TASK, id)
    } catch (e) { }

  },

  async completeTask ({ commit }, { id }) {
    try {
      const { data } = await axios.post(`/api/tasks/complete/${id}`)

      commit(types.UPDATE_TASK, { task: data })
    } catch (e) { }

  },

  async fetchTemplates ({ commit }) {
    try {
      const { data } = await axios.get('/api/tasks/templates')

      commit(types.FETCH_TEMPLATES, { templates: data })

      return data
    } catch (e) {
      return []
    }
  },

  async fetchUsers ({ commit }) {
    try {
      const { data } = await axios.get('/api/users')

      commit(types.FETCH_USERS, { users: data })

      return data
    } catch (e) {
      return []
    }
  },

  async fetchFilters ({ commit }) {
    try {
      const { data } = await axios.get('/api/v1/system/list?type=task_dashboard')

      commit(types.FETCH_FILTERS, { filters: data })

      return data
    } catch (e) {
      return []
    }
  },

  async saveFilter ({ commit }, { name, filters }) {
    try {
      const { data } = await axios.post('/api/v1/system/list', {
        name,
        type: 'task_dashboard',
        filters: JSON.stringify(filters)
      })

      commit(types.SAVE_FILTER, { filter: data })
    } catch (e) {}
  },

  async deleteFilter ({ commit }, { id }) {
    try {
      await axios.delete(`/api/v1/system/list/${id}`)

      commit(types.DELETE_FILTER, id)
    } catch (e) { }
  }
}
