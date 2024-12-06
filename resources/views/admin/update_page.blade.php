<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 200px;
            padding: 20px;
        }

        input[type='text'] {
            width: 300px;
            height: 60px;
        }

        textarea {
            width: 450px;
            height: 100px;
        }
    </style>
</head>

<body>

    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h2>Update Produk</h2>

                <div class="div_deg">


                    <form action="{{url('edit_produk',$data->id)}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div>
                            <label>Nama Produk</label>
                            <input type="text" name="title" value="{{$data->title}}">
                        </div>

                        <div>
                            <label>Deskripsi</label>
                            <textarea name="deskripsi">{{$data->deskripsi}}</textarea>
                        </div>

                        <div>
                            <label>Harga</label>
                            <input type="text" name="harga" value="{{$data->harga}}">
                        </div>

                        <div>
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{$data->quantity}}">
                        </div>

                        <div>
                            <label>Kategori</label>
                            <select name="category">

                                <option value="">{{$data->category}}</option>


                            </select>
                        </div>

                        <div>
                            <label>Image</label>
                            <img width="200" src="/produks/{{$data->image}}">
                        </div>

                        <div>
                            <label>Gambar Baru</label>
                            <input type="file" name="image">
                        </div>

                        <div>
                            <input class="btn btn-success" type="submit" value="Update Produk">
                        </div>







                    </form>



                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>

</html>