
  function filterSublocations() {
    // Get all main location radio buttons
    const mainLocationRadios = document.getElementsByName('location');
    
    // Get all sublocation options
    const subLocationOptions = document.querySelectorAll('select[name="category"] option');
    
    // Add event listeners to main location radio buttons
    mainLocationRadios.forEach(radio => {
      radio.addEventListener('change', () => {
        const selectedMainLocID = radio.value; // Get selected main location ID

        // Loop through sublocation options and toggle visibility
        subLocationOptions.forEach(option => {
          const optionMainLocID = option.id.replace('mainloc', ''); // Extract mainlocID from option ID
          if (optionMainLocID === selectedMainLocID || option.value === "0") {
            option.style.display = 'block'; // Show matching sublocations
          } else {
            option.style.display = 'none'; // Hide non-matching sublocations
          }
        });

        // Set the first visible sublocation as selected
        const firstVisibleOption = Array.from(subLocationOptions).find(option => option.style.display === 'block');
        if (firstVisibleOption) {
          firstVisibleOption.selected = true;
        }
      });
    });
  }

  // Initialize the filtering functionality on page load
  document.addEventListener('DOMContentLoaded', filterSublocations);
