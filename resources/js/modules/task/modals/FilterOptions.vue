<template>
  <b-modal :id="id" title="Filter Options" @ok="filter">
    <b-form-group label="Search By Case ID">
      <b-input v-model="options.case_id" />
    </b-form-group>
    <b-form-group label="Search By Status">
      <b-form-select v-model="options.status">
        <option value="any">Any</option>
        <option value="pending">Pending</option>
        <option value="complete">Complete</option>
        <option value="overdue">Overdue</option>
      </b-form-select>
    </b-form-group>
    <b-form-row>
      <b-form-group label="Due Date From" class="col-6">
        <b-form-datepicker v-model="options.due_date_from" />
      </b-form-group>
      <b-form-group label="Due Date To" class="col-6">
        <b-form-datepicker v-model="options.due_date_to" />
      </b-form-group>
    </b-form-row>
    <b-form-row>
      <b-form-group label="Assigned At From" class="col-6">
        <b-form-datepicker v-model="options.assigned_at_from" />
      </b-form-group>
      <b-form-group label="Assigned At To" class="col-6">
        <b-form-datepicker v-model="options.assigned_at_to" />
      </b-form-group>
    </b-form-row>
    <b-form-row>
      <b-form-group label="Completed At From" class="col-6">
        <b-form-datepicker v-model="options.completed_at_from" />
      </b-form-group>
      <b-form-group label="Completed At To" class="col-6">
        <b-form-datepicker v-model="options.completed_at_to" />
      </b-form-group>
    </b-form-row>

    <template #modal-footer="{ ok }">
      <b-button variant="primary" @click="ok()">
        Filter
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
    options: {
      type: Object
    },
    filter: {
      type: Function
    }
  }
};
</script>