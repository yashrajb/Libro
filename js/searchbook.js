var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(20.5937, 78.9629),
          zoom: 5
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/libro/map.php?q='+document.getElementById("search").value, function(data) {
            var xml = data.responseXML;
            var markers = xml.getElementsByTagName("book");
              Array.prototype.forEach.call(markers, function(markerElem) {
              var book_name = markerElem.getAttribute('book-name');
              var book_author = markerElem.getAttribute('book-author');
              var book_edition = markerElem.getAttribute('book-edition');
              var rent_days = markerElem.getAttribute('rent-days');
              var address = markerElem.getAttribute('address');
              var email = markerElem.getAttribute('email');
              var username = markerElem.getAttribute('username');
              var street = markerElem.getAttribute('street');
              var state = markerElem.getAttribute('state');
              var city = markerElem.getAttribute('city');
              var type = markerElem.getAttribute('type');

              /*


    -----------------End of books variables and book information--------------------------------

              */

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng'))
                  );

              var infowincontent = document.createElement('div');
              var book_name_strong = document.createElement('strong');
              book_name_strong.textContent = 'Book Name - '+book_name;
              infowincontent.appendChild(book_name_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_auth_strong = document.createElement('strong');
              book_auth_strong.textContent = 'Book Author - '+book_author;
              infowincontent.appendChild(book_auth_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_edit_strong = document.createElement('strong');
              book_edit_strong.textContent = 'Book Edition - '+book_edition;
              infowincontent.appendChild(book_edit_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_rent_strong = document.createElement('strong');
              book_rent_strong.textContent = 'Book Rent Days - '+rent_days;
              infowincontent.appendChild(book_rent_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_email_strong = document.createElement('strong');
              book_email_strong.textContent = 'Email - '+email;
              infowincontent.appendChild(book_email_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_username_strong = document.createElement('strong');
              book_username_strong.textContent = 'Email - '+username;
              infowincontent.appendChild(book_username_strong);
              infowincontent.appendChild(document.createElement('br'));              


              var book_add_strong = document.createElement('strong');
              book_add_strong.textContent = 'Address - '+address;
              infowincontent.appendChild(book_add_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_street_strong = document.createElement('strong');
              book_street_strong.textContent = 'Street - '+street;
              infowincontent.appendChild(book_street_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_city_strong = document.createElement('strong');
              book_city_strong.textContent = 'City - '+city;
              infowincontent.appendChild(book_city_strong);
              infowincontent.appendChild(document.createElement('br'));

              var book_st_strong = document.createElement('strong');
              book_st_strong.textContent = 'State - '+state;
              infowincontent.appendChild(book_st_strong);
              infowincontent.appendChild(document.createElement('br'));


              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}