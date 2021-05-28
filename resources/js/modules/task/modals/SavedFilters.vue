<template>
  <b-modal :id="id" title="Saved Filters">
    <b-list-group>
      <b-list-group-item v-for="filter in filters" :key="filter.id" class="d-flex justify-content-between align-items-center">
        <b-button variant="link" @click="setFilter(filter.id)">{{ filter.name }}</b-button>
        <b-button variant="danger" size="sm" @click="deleteFilter(filter.id)">Delete</b-button>
      </b-list-group-item>
    </b-list-group>
    <template #modal-footer="{ ok }">
      <b-button variant="primary" @click="ok()">
        Close
      </b-button>
    </template>
  </b-modal>
</template>

<script>
export default {
  props: {
    id: {
      type: String
    },
    filters: {
      type: Array
    },
    setFilter: {
      type: Function
    },
    deleteFilter: {
      type: Function
    }
  }
};
</script>