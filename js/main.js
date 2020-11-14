let app = new Vue({
  el: ".app_div",
  data: {
    vueUsers: [],
    vueErrorMsg: false,
  },
  methods: {
    getData: function () {
      axios
        .get("http://localhost/Laravel_Vue/vue_crud/api.php?action=read")
        .then(function (myResponse) {
          if (!isset(myResponse.data.error)) {
            app.vueUsers = myResponse.data.users;
          } else {
            app.vueErrorMsg = myResponse.data.errorMsg;
          }
        });
    },
  },
  mounted: function () {
    this.getData();
  },
});
