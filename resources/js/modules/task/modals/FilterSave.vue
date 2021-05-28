<template>
  <b-modal :id="id" title="Save Filter" @ok="saveFilter(name)">
    <b-form-group label="Filter Name">
      <b-input v-model="name" />
    </b-form-group>
    <template #modal-footer="{ ok }">
      <b-button variant="primary" @click="ok()">
        Save
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
    saveFilter: {
      type: Function
    }
  },

  data: () => ({
    name: ''
  })
};
</script>