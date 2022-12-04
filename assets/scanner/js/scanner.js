(function() {
  var app;
  var route = "Shopping/getPro/";

  app = new Vue({
    el: '#app',
    data: {
      scanner: null,
      activeCameraId: null,
      cameras: [],
      scans: []
    },
    mounted: function() {
      var self;
      self = this;
      self.scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        scanPeriod: 3,
        mirror: false
      });
      self.scanner.addListener('scan', function(content, image) {
        $("#code").val(content);

        var dataku =content.split('|');
        var username  = dataku[0];
        var password  = dataku[1];

        $("#das1").val(username);
        $("#das2").val(password);

        // var formku = document.getElementById("loginForm");

        try {
          document.getElementById('daw').click();
        }
        catch(err) {
          document.getElementById('login').click();
        }


        
        // document.getElementById('daw').click();
        // document.getElementById('login').click();
        // document.getElementById("login").addEventListener("click", function () {
        //  document.getElementById("loginForm").submit();
        // });

        // document.getElementById("loginForm").submit(); //ini buat submit
        // return window.location = route;

      //   var formData = new FormData($('#loginForm')[0]);
      //   $.ajax({
      //   url: "<?= site_url('auth/login') ?>",
      //   type: "POST",
      //   data: formData,
      //   contentType: false,
      //   processData: false,
      //   success: function(data) {
      //     $("input").removeAttr("disabled", "disabled");
      //     if (data.result) {
      //       $('#message').html('<div class="alert green">' + data.content + '</div>');
      //       window.location.replace('<?= base_url() ?>');
      //     } else {
      //       $('#message').html('<div class="alert red">' + data.content + '</div>');

      //     }

      //   },
      //   error: function(jqXHR, textStatus, errorThrown) {
      //     $("input").removeAttr("disabled", "disabled");
      //     $('#message').html('<div class="alert red">Terjadi kesalahan</div>');

      //   },
      //   beforeSend: function() {
      //     $("input").attr("disabled", "disabled");
      //     $("#message").html('<div class="progress blue lighten-4"><div class="indeterminate blue"></div> </div>');
      //   }
      // });
      // return false;

      });
      return Instascan.Camera.getCameras().then(function(cameras) {
        self.cameras = cameras;
        if (cameras.length > 0) {
          if (cameras[1]) {
            self.activeCameraId = cameras[1].id;
            return self.scanner.start(cameras[1]);
          } else {
            self.activeCameraId = cameras[0].id;
            return self.scanner.start(cameras[0]);
          }
        } else {
          return console.error('No cameras found.');
        }
      }).catch(function(e) {
        return console.error(e);
      });
    },
    methods: {
      formatName: function(name) {
        return name || '(unknown)';
      },
      selectCamera: function(camera) {
        this.activeCameraId = camera.id;
        return this.scanner.start(camera);
      }
    }
  });

}).call(this);
