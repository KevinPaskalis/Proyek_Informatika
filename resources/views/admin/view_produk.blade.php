<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 70px;
        }

        .tabel_deg {
            border: 5px solid blanchedalmond;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }

        input[type='search'] {
            width: 500px;
            height: 60px;
            margin-left: 50px;

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


                <form action="{{url('cari_produk')}}" method="get">
                    @csrf
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-secondary" value="Cari">

                </form>


                <div class="div_deg">

                    <table class="tabel_deg">

                        <tr>
                            <th>Nama Produk</th>

                            <th>Deskripsi</th>

                            <th>Kategori</th>

                            <th>Harga</th>

                            <th>Quantity</th>

                            <th>Gambar Produk</th>

                            <th>Edit</th>

                            <th>Hapus</th>



                        </tr>

                        @foreach($produk as $produks)

                        <tr>
                            <td>{{$produks->title}}</td>

                            <td>{{$produks->deskripsi}}</td>

                            <td>{{$produks->category}}</td>

                            <td>{{$produks->harga}}</td>

                            <td>{{$produks->quantity}}</td>

                            <td>
                                <img height="200" width="200" src="produks/{{$produks->image}}">

                            </td>

                            <td>
                                <a class="btn btn-success" href="{{url('update_produk',$produks->id)}}">Edit</a>
                            </td>

                            <td>
                                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('hapus_produk',$produks->id)}}">Hapus</a>
                            </td>



                        </tr>

                        @endforeach




                    </table>






                </div>
                <div class="div_deg">
                    {{$produk->onEachSide(1)->links()}}
                </div>


            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.js')

</body>

</html>