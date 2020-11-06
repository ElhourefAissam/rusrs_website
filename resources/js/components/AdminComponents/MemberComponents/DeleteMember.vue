<template>
<v-col md="4">
    <v-btn
      color="error"
      dark
      @click.stop="dialog = true"
      small
    >
      <v-icon>delete</v-icon>
    </v-btn>

    <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="headline">
           تنبيه؟
        </v-card-title>

        <v-card-text>
           هل تريد مسح هذه العضو؟
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            لا
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="DeleteMember"
          >
            نعم
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
import memberService from "../../../Services/MemberService";

export default {
    props: ['Member'],
    data: function () {
        return {
            dialog:false
        }
    },
    methods: {
            DeleteMember: async function () {
                const isDeleted = await memberService.deleteMember(this.Member.id)
                this.$emit('memberDeleted', isDeleted.success)
                this.dialog = false
            },
    },
}
</script>
