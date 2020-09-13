

@if (session('success'))
    
<script>

new Noty({

    type:'success',
    theme    : 'relax',
    layout:'topRight',
    text:"{{session('success')}}",
    timeout:2000,
    killer:true,
    

}).show();



</script>

@endif