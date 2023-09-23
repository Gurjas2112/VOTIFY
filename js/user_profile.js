 // Get the user profile dropdown element
 var userProfileDropdown = document.querySelector('.user-profile-dropdown');

 // Add a click event listener to toggle the dropdown
 userProfileDropdown.addEventListener('click', function () {
     var dropdownContent = this.querySelector('.dropdown-content');
     if (dropdownContent.style.display === 'block') {
         dropdownContent.style.display = 'none';
     } else {
         dropdownContent.style.display = 'block';
     }
 });