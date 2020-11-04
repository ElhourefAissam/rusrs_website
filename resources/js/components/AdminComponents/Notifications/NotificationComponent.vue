<template>
  <div class="text-center">
    <v-snackbar
      v-model ="notification.snackbar"
      :timeout="notification.timeout"
      :color="notification.color"
      top
    >
      {{ notification.message }}

      <template v-slot:action="{ attrs }">
        <v-btn
          text
          v-bind="attrs"
          @click="notification.snackbar = false"
        >
          <span class="white--text">إغلاق</span>
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>


export default {
    props:["notification"],
}
</script>
