<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <!--Framework-->
    <link rel="stylesheet" href="{{asset('css/frame.css') }}">
    <!--Main tamplate css file  -->
    <link rel="stylesheet" href="{{asset('css/register.css') }}">
    <!--Render all elements normally-->
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">
    <!--Font awsome library-->
    <link rel="stylesheet" href="{{asset('css/normalize.css') }}">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;600;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="dots dots-up"></div>
    <div class="register">
        <div class="content">
            <p class="title c-black">Register</p>
            <form action="/api/client/register" method="POST">
                 @csrf
                <div class="form-content">
                    <input type="text" name="client_name" placeholder="Username">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-content">
                    <input type="email" name="email" placeholder="Email">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-content">
                    <input type="password" name="password"placeholder=" Password">
                    <i class="fas fa-unlock"></i>
                </div>
                <!-- <div class="form-content">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    <i class="fas fa-lock"></i>
                </div> -->
               

                <!-- <div class="location">

                    <div class="country">
                        <label for="country">country</label>
                        <select id="country" name="countrylist" class="select">
                            <option value="syria">syria</option>
                        </select>
                    </div>

                    <div class="city">
                        <label for="city">city</label>
                        <select id="city" name="citylist" class="select">
                            <option value="syria">syria</option>
                            <option value="syria">aleppo</option>
                            <option value="syria">syria</option>
                            <option value="syria">syria</option>
                            <option value="syria">syria</option>
                        </select>
                    </div>

                    <div class="neighborhood">
                        <label for="neighborhood">neighborhood</label>
                        <select id="neighborhood" name="neighborhoodlist" class="select">
                            <option value="syria">syria</option>
                        </select>
                    </div>
                </div> -->
                <div class="location">
                    <div class="country">
                        <label for="country">Country</label>
                        <br>
                        <select id="country" name="countrylist" class="select">
                            <option value="syria">Syria</option>
                        </select>
                    </div>
                    <div class="city">
                        <label for="city">City</label>
                        <br>
                        <select id="city" name="citylist" class="select" onchange="populateNeighborhoods()">
                            <option value="aleppo">Aleppo</option>
                            <option value="damascus">Damascus</option>
                            <option value="homs">Homs</option>
                            <option value="latakia">Latakia</option>
                            <option value="hama">Hama</option>
                            <option value="deir ez-zor">Deir ez-Zor</option>
                            <option value="al-Hasakah">Al-Hasakah</option>
                            <!-- Add more options here -->
                        </select>
                    </div>
                    <div class="neighborhood">
                        <label for="neighborhood">Neighborhood</label>
                        <br>
                        <select id="neighborhood" name="neighborhoodlist" class="select">
                            <option value="">Select a city first</option>
                        </select>
                    </div>
                </div>

                <script>
                    // Define a nested array of neighborhoods for each city
                    const neighborhoods = {
                        aleppo: ['Neighborhood 1', 'Neighborhood 2', 'Neighborhood 3'],
                        damascus: ['Neighborhood 4', 'Neighborhood 5', 'Neighborhood 6'],
                        homs: ['Neighborhood 7', 'Neighborhood 8', 'Neighborhood 9'],
                        latakia: ['Neighborhood 10', 'Neighborhood 11', 'Neighborhood 12'],
                        hama: ['Neighborhood 13', 'Neighborhood 14', 'Neighborhood 15'],
                        'deir ez-zor': ['Neighborhood 16', 'Neighborhood 17', 'Neighborhood 18'],
                        'al-Hasakah': ['Neighborhood 19', 'Neighborhood 20', 'Neighborhood 21'],
                        // Add more neighborhoods here
                    };

                    // Function to populate the neighborhood select element based on the selected city
                    function populateNeighborhoods() {
                        const citySelect = document.getElementById('city');
                        const neighborhoodSelect = document.getElementById('neighborhood');
                        const selectedCity = citySelect.value;
                        const cityNeighborhoods = neighborhoods[selectedCity] || [];

                        // Clear the current options
                        neighborhoodSelect.innerHTML = '';

                        // Add the new options
                        if (cityNeighborhoods.length) {
                            neighborhoodSelect.disabled = false;
                            neighborhoodSelect.options[0] = new Option('-- Select a neighborhood --', '');
                            for (let i = 0; i < cityNeighborhoods.length; i++) {
                                neighborhoodSelect.options[i + 1] = new Option(cityNeighborhoods[i], cityNeighborhoods[i]);
                            }
                        } else {
                            neighborhoodSelect.disabled = true;
                            neighborhoodSelect.options[0] = new Option('-- No neighborhoods found --', '');
                        }
                    }
                </script>

                <button class="submit">redister <i class="fas fa-chevron-right"></i></button>
            
            </form>
        </div>
    </div>
</body>

</html>