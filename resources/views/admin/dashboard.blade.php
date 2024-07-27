<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/cardanimation_admin.css') }}">

<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>
  
  <header class="masthead">
    <div class="container">
        <div class="card-deck ">
            <div class="col">
                <div class="card mb-3 boxgreen rounded box shadow" style="background: #40407a;">
                    <div class="card-body  ">
                        <p class="card-text  text-center text-white mb-xl-1 " style="font-size: 70px;">
                            <i class="fas fa-users"></i>
                        </p>
                        <p class="card-text counter h1 font-weight-bolder text-center text-white">{{ $numOfStudents }}</p>
                        <p class="card-text h6 mb-3 mt-md-4 text-center text-white">Siswa telah terdaftar di sistem </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white rounded bg-danger shadow-lg">
                    <div class="card-body">
                        <p class="card-text  text-center text-white mb-xl-1 " style="font-size: 70px;">
                            <i class="fas fa-user-cog"></i>
                        </p>
                        <p class="card-text h1 font-weight-bolder counter text-center text-white ">{{ $numOfTeachers }}</p>
                        <p class="card-text h6 mb-3 mt-md-4 text-center text-white ">Akun Guru Terdaftar</p>
                    </div>
                    <!-- begin:: content -->
                    <div class="shape"></div>
                </div>
            </div>
        </div>
    </div>
    <svg style="pointer-events: none" class="wave" width="100%" height="70px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
        <defs>
        <style>
            .a {
            fill: none;
            }

            .b {
            clip-path: url(#a);
            }

            .c,
            .d {
            fill: #f9f9fc;
            }

            .d {
            opacity: 0.5;
            isolation: isolate;
            }
        </style>
        <clipPath id="a">
            <rect class="a" width="1920" height="75"></rect>
        </clipPath>
        </defs>
        <title>wave</title>
        <g class="b">
        <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path>
        </g>
        <g class="b">
        <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path>
        </g>
        <g class="b">
        <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path>
        </g>
        <g class="b">
        <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path>
        </g>
    </svg>
  </header>
</x-layout>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function(now) {
            $(this).text(Math.ceil(now));
            }
        });
        });

    });
</script>
