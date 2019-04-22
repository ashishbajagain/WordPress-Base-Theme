<?php
/**
 * Template Name: Contact
 */
?>
<?php get_header(); ?>

  <!-- contact page contents  -->
  <div class="container">
    <h1>Contact Page</h1>
  </div>

<?php get_footer(); ?>

<!-- end of body -->
<?php wp_footer(); ?>
<!-- google maps js -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<!-- acf google map initialization -->
<script type="text/javascript">
  (function($) {
    function render_map( $el ) {
      var $markers = $el.find('.marker');
      var args = {
        zoom        : 15,
        center      : new google.maps.LatLng(0, 0),
        mapTypeId   : google.maps.MapTypeId.ROADMAP,
        scrollwheel : false,
        draggable   : false
      };
      var map = new google.maps.Map( $el[0], args);
      map.markers = [];
      $markers.each(function(){
        add_marker( $(this), map );
      });
      center_map( map );
    }

    function add_marker( $marker, map ) {
      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
      var marker = new google.maps.Marker({
        position  : latlng,
        map       : map
      });
      map.markers.push( marker );
      if( $marker.html() ) {
        var infowindow = new google.maps.InfoWindow({
          content : $marker.html()
        });
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open( map, marker );
        });
      }
    }

    function center_map( map ) {
      var bounds = new google.maps.LatLngBounds();
      $.each( map.markers, function( i, marker ){
        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
        bounds.extend( latlng );
      });
      if( map.markers.length == 1 ) {
        map.setCenter( bounds.getCenter() );
        map.setZoom( 15 );
      }
      else {
        map.fitBounds( bounds );
      }
    }

    $(document).ready(function(){
      $('.acf-map').each(function(){
        render_map( $(this) );
      });
    });
  })(jQuery);
</script>
</body>
</html>
