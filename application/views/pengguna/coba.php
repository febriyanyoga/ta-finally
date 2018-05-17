<!DOCTYPE html>
<html>
<head>
  <title></title>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<link href="<?php echo base_url();?>assets/css/easy-autocomplete.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>assets/js/jquery.easy-autocomplete.js"></script>
</head>
<body>
  <form>
    <input type="text" name="id" id="id">
    <input type="text" name="barang" id="barang">
  </form>
</body>
</html>

<script type="text/javascript">
    // js progress barang
    $(document).ready(function(){

       var options = {

        url: "<?php echo base_url().'BarangC/dropdown'?>",

        getValue: function(element) {
          return element.nama_barang;
        },

        list: {
          onSelectItemEvent: function() {
            var selectedItemValue = $("#barang").getSelectedItemData().kode_barang;

            $("#id").val(selectedItemValue).trigger("change");
          },
           match: {
              enabled: true
          }
            //   onHideListEvent: function() {
            //     $("#inputTwo").val("").trigger("change");
            // }wait okey
          }
        };


        $("#barang").easyAutocomplete(options);
    });

    /* Dengan Rupiah */
   
 
    </script>
