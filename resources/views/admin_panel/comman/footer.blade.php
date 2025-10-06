
<script src="{{asset('../../assets/lib/feather-icons/feather.min.js')}}"></script>

  <script src="{{asset('../../assets/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('../../assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('../../assets/lib/feather-icons/feather.min.js')}}"></script>
  <script src="{{asset('../../assets/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<!-- jQuery (Required for Bootstrap JS) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="{{asset('../../assets/js/dashforge.js')}}"></script>

  <!-- append theme customizer -->
  <script src="{{asset('../../assets/lib/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('../../assets/js/calendar-events.js')}}"></script>
  <script src="{{asset('../../assets/js/dashforge.settings.js')}}"></script>
  <script src="https://themepixels.me/demo/dashforge2/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="https://themepixels.me/demo/dashforge2/lib/prismjs/prism.js"></script>
  <script src="https://themepixels.me/demo/dashforge2/assets/js/dashforge.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  
  <script>
      $(function(){
        'use strict'

        $('#modal6').on('show.bs.modal', function (event) {

          var animation = $(event.relatedTarget).data('animation');
          $(this).addClass(animation);
        })

        // hide modal with effect
        $('#modal6').on('hidden.bs.modal', function (e) {
          $(this).removeClass (function (index, className) {
              return (className.match (/(^|\s)effect-\S+/g) || []).join(' ');
          });
        });

      });
    </script>

  <script>
    $(function(){
      'use script'

      window.darkMode = function(){
        $('.btn-white').addClass('btn-dark').removeClass('btn-white');
      }

      window.lightMode = function() {
        $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
      }

      var hasMode = Cookies.get('df-mode');
      if(hasMode === 'dark') {
        darkMode();
      } else {
        lightMode();
      }
    })
  </script>
  
</body>
</html>
