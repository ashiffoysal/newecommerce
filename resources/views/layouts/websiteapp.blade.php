P<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Durbar IT Ecommerce</title>

    @if($themecheck->id==1)
         @include('frontend.include.home1.header1css')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.header2css')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.header3css')
    @elseif($themecheck->id==4)
       @include('frontend.include.home4.css')
    @elseif($themecheck->id==5)
       @include('frontend.include.home5.css')
    @elseif($themecheck->id==6)
    @include('frontend.include.home6.css')
     @elseif($themecheck->id==7)
    @include('frontend.include.home7.css')
     @elseif($themecheck->id==8)
    @include('frontend.include.home8.css')
    @elseif($themecheck->id==9)
    @include('frontend.include.home9.css')
     @elseif($themecheck->id==10)
    @include('frontend.include.home10.css')
      @elseif($themecheck->id==11)
    @include('frontend.include.home11.css')
    @endif
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- main header1 -->
    @if($themecheck->id==1)
     @include('frontend.include.home1.headertop1')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.headertop2')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.headertop3')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.headertop')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.headertop')
    @elseif($themecheck->id==6)
    @include('frontend.include.home6.headertop')
    @elseif($themecheck->id==7)
    @include('frontend.include.home7.headertop')
     @elseif($themecheck->id==8)
    @include('frontend.include.home8.headertop')
      @elseif($themecheck->id==9)
    @include('frontend.include.home9.headertop')
    @elseif($themecheck->id==10)
    @include('frontend.include.home10.headertop')
    @elseif($themecheck->id==11)
    @include('frontend.include.home11.headertop')
    @endif
    <!-- main header1 end -->

    <!-- mobile -->
    @if($themecheck->id==1)
    @include('frontend.include.home1.mobile_h1')
     @elseif($themecheck->id==2)
         @include('frontend.include.home2.mobile_h2')
    @elseif($themecheck->id==3)
        @include('frontend.include.home3.mobile_h3')
    @elseif($themecheck->id==4)
       @include('frontend.include.home4.mobile')
    @elseif($themecheck->id==5)
       @include('frontend.include.home5.mobile')
    @elseif($themecheck->id==6)
   @include('frontend.include.home6.mobile')
    @elseif($themecheck->id==7)
   @include('frontend.include.home7.mobile')
   @elseif($themecheck->id==8)
   @include('frontend.include.home8.mobile')
    @elseif($themecheck->id==9)
   @include('frontend.include.home9.mobile')
    @elseif($themecheck->id==10)
   @include('frontend.include.home10.mobile')
   @elseif($themecheck->id==11)
   @include('frontend.include.home11.mobile')
    @endif
    <!-- mobile end -->

    <!-- maincntent -->
   
    @yield('content')
 


    <!-- maincontentend -->

    <!-- add footerh1 -->
    @if($themecheck->id==1)
        @include('frontend.include.home1.footerh1')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.footerh2')
    @elseif($themecheck->id==3)
         @include('frontend.include.home3.footerh3')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.footer')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.footer')
     @elseif($themecheck->id==6)
        @include('frontend.include.home6.footer')
    @elseif($themecheck->id==7)
    @include('frontend.include.home7.footer')
    @elseif($themecheck->id==8)
    @include('frontend.include.home8.footer')
        @elseif($themecheck->id==9)
    @include('frontend.include.home9.footer')
     @elseif($themecheck->id==10)
    @include('frontend.include.home10.footer')
     @elseif($themecheck->id==11)
    @include('frontend.include.home11.footer')
    @endif
     <!-- add footerh1 end-->

    <!-- add version1 js -->
    @if($themecheck->id==1)
        @include('frontend.include.home1.header1js')
    @elseif($themecheck->id==2)
        @include('frontend.include.home2.header2js')
    @elseif($themecheck->id==3)
        @include('frontend.include.home3.header3js')
    @elseif($themecheck->id==4)
        @include('frontend.include.home4.js')
    @elseif($themecheck->id==5)
        @include('frontend.include.home5.js')
    @elseif($themecheck->id==6)
        @include('frontend.include.home6.js')
    @elseif($themecheck->id==7)
        @include('frontend.include.home7.js')
    @elseif($themecheck->id==8)
        @include('frontend.include.home8.js')
    @elseif($themecheck->id==9)
        @include('frontend.include.home9.js')
    @elseif($themecheck->id==10)
        @include('frontend.include.home10.js')
    @elseif($themecheck->id==11)
        @include('frontend.include.home11.js')
    @endif
    <!-- add version1 js -->

<script>
    
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':

                iziToast.success({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'info':
                iziToast.info({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'warning':
                iziToast.warning({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
            case 'error':
                iziToast.error({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
        }
        @endif
    </script>




<script>
    window.onload = function(){

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/show/total/price') }}",

                success: function(data) {
                    var totalPrice = data.total;
                    var totalPrice = totalPrice.toFixed(2);
                    document.getElementById('cartdatacount').innerHTML = data.quantity;
                    document.getElementById('product_price').innerHTML = totalPrice;

                }
            });
    }
</script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.mywishlist').on('click', function () {
                var id = $(this).data('id');
                //alert(id);
                if (id) {

                    $.ajax({
                        url: "{{ url('/product/add/wishlist/') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        processData: false,
                        success: function (data) {
                            //console.log(data);
                             // $('#countwish').html();
                            if (data.check) {
                                  iziToast.error({
                                        message: 'This Product All ready Add wishlist',
                                        'position':'topRight'
                                    });

                            } else {
                                    iziToast.success({
                                        message: 'Product Add to wishlist ',
                                        'position':'topRight'
                                    });
                            }
                        }
                    });
                } else {
                    alert('danger');
                }
            });
            // 
            $('.mywishlist').on('click', function () {
                var id = $(this).data('id');
                //alert(id);
                if (id) {

                    $.ajax({
                        url: "{{ url('/product/add/wishlist/count') }}/" + id,
                        type: "GET",
                        dataType: "json",
                        processData: false,
                        success: function (data) {
                            //console.log(data);
                            document.getElementById('countwish').innerHTML = data.data;

                              //$('#countwish').html(data);
                        }
                    });
                } else {
                    alert('danger');
                }
            });



        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.compare').on('click', function () {
                var com_id = $(this).data('id');
               //alert(com_id);
                if (com_id) {
                    $.ajax({
                        url: "{{ url('/product/add/compare/') }}/" + com_id,
                        type: "GET",
                        dataType: "json",
                        processData: false,
                        success: function (data) {
                           
                            if (data.check) {
                                  iziToast.error({
                                        message: 'This Product All ready Add compare',
                                        'position':'topRight'
                                    });
                                  document.getElementById('countcompare').innerHTML = data.comcount;

                            } else {
                                    iziToast.success({
                                        message: 'Product Add to compare ',
                                        'position':'topRight'
                                    });
                                    document.getElementById('countcompare').innerHTML = data.comcount;
                            }

                        }
                    });
                } else {
                    alert('danger');
                }
            });
            // 
            // $('.mywishlist').on('click', function () {
            //     var id = $(this).data('id');
            //     //alert(id);
            //     if (id) {

            //         $.ajax({
            //             url: "{{ url('/product/add/wishlist/count') }}/" + id,
            //             type: "GET",
            //             dataType: "json",
            //             processData: false,
            //             success: function (data) {
                            
            //                 document.getElementById('countwish').innerHTML = data.data;

                             
            //             }
            //         });
            //     } else {
            //         alert('danger');
            //     }
            // });



        });
    </script>


    <!-- compare -->

</body>



</html>