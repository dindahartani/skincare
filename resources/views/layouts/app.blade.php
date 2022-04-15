<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skincare</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Static CSS -->
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <!-- The sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{asset('image/logo-2.jpeg')}}" >
        </div>
       
        <a class="active" href="{{ route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>  Beranda</a>
        <a class="active" href="{{ route('browsing')}}"><i class="fa fa-globe"></i>  Browsing</a>
        <a class="active" href="{{ route('searching')}}"><i class="fa fa-search"></i>  Searching</a>
        <a class="bg-secondary" href=""><i class="fa fa-list-ul" aria-hidden="true"></i>  Kriteria</a>
        <a href="{{ route('totalmerek')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Merek Skincare</a>
        <a href="{{ route('totaljenis')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Jenis Skincare</a>
        <a href="{{ route('totaltipekulit')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Tipe Kulit</a>
        <a href="{{ route('totalwp')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Waktu Penggunaan</a>
        <a href="{{ route('totalmk')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Masalah Kulit</a>
        <a href="{{ route('totalusia')}}"><i class="fa fa-circle-o fa-fw" aria-hidden="true"></i>  Usia</a>
    </div>



<!-- Page content -->
<div class="content">
    <div class="topnav" id="myTopnav">
    
        <div class="form-group mt-3">
            <table class="table table-borderless" >
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control border bg-white text-dark" value="@yield('namepage', 'Skincare')" readonly=""></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>

    <div class="container-fluid">
        @yield('content')
    </div>
</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
        }
    </script>
</body>
</html>