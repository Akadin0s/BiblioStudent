import { all } from 'axios';
import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    const zoomImages = document.querySelectorAll('.zoom');
    const threeDImages = document.querySelectorAll('.three-d');
    const sidePanel = document.querySelector('.side-pannel');
    const sidePanelButton = document.getElementById('side-pannel');
    const overlay = document.createElement('div'); // Create overlay element

    // Add overlay to the body
    overlay.classList.add('overlay');
    document.body.appendChild(overlay);

    // Function to check if the side panel is open
    const isSidePanelOpen = () => sidePanel.style.display === 'block';

    // Add zoom effect to images
    zoomImages.forEach((image) => {
        image.addEventListener('mouseover', () => {
            if (isSidePanelOpen()) return; // Disable effect if side panel is open
            image.style.transform = 'scale(1.1)'; // Zoom in by 10%
            image.style.transition = 'transform 0.3s ease'; // Smooth transition
        });

        image.addEventListener('mouseout', () => {
            if (isSidePanelOpen()) return; // Disable effect if side panel is open
            image.style.transform = 'scale(1)'; // Reset zoom
        });
    });


    if (sidePanel && sidePanelButton) {
        // Add transition styles to the side panel
        sidePanel.style.transition = 'transform 0.3s ease, opacity 0.3s ease';
        sidePanel.style.transform = 'translateX(100%)'; // Initially hidden
        sidePanel.style.opacity = '0';
        sidePanel.style.display = 'block'; // Ensure it's part of the DOM but hidden

        // Show the side panel and overlay when the button is clicked
        sidePanelButton.addEventListener('click', function () {
            sidePanel.style.transform = 'translateX(0)';
            sidePanel.style.opacity = '1'; // Make visible
            overlay.style.display = 'block'; // Show overlay
            overlay.style.opacity = '1'; // Ensure overlay is visible
            document.body.classList.add('no-scroll'); // Disable scrolling
        });

        // Hide the side panel and overlay when clicking outside of it
        document.addEventListener('click', function (event) {
            if (!sidePanel.contains(event.target) && event.target !== sidePanelButton) {
                sidePanel.style.transform = 'translateX(100%)';
                sidePanel.style.opacity = '0'; // Make invisible
                overlay.style.display = 'none'; // Hide overlay
                document.body.classList.remove('no-scroll'); // Enable scrolling
            }
        });
    }

    // Add 3D movement effect to images
    threeDImages.forEach((image) => {
        // Ensure the parent container has the required styles
        const parent = image.parentElement;
        parent.style.perspective = '1000px'; // Add perspective for 3D effect
        parent.style.transformStyle = 'preserve-3d'; // Preserve 3D transformations

        image.addEventListener('mousemove', (e) => {

            const rect = image.getBoundingClientRect();
            const x = e.clientX - rect.left; // Mouse X position relative to the image
            const y = e.clientY - rect.top;  // Mouse Y position relative to the image

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 40; // Adjust rotation intensity
            const rotateY = (centerX - x) / 40;

            image.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`; // Apply 3D rotation
            image.style.transition = 'none'; // Disable transition during movement
        });

        image.addEventListener('mouseleave', () => {

            image.style.transform = 'rotateX(0) rotateY(0)'; // Reset on mouse leave
            image.style.transition = 'transform 0.3s ease'; // Smooth reset
        });
    });



    // Blur other #niveau elements when one is selected
    function showHiddenDiv(selectedElement) {
        const allNiveaux = document.querySelectorAll('#nv'); // Select all divs with these IDs

        // Check if the selected element is already active
        const isActive = selectedElement.classList.contains('active');

        // Remove blur and active class from all elements
        allNiveaux.forEach(niveau => {
            niveau.classList.remove('active');
        });

        // If the selected element was not active, apply blur to others and mark it as active
        if (!isActive) {

            selectedElement.classList.add('active'); // Mark the clicked element as active
        }

    }


    // Expose the function to the global scope
    window.showHiddenDiv = showHiddenDiv;


    // Blur other #niveau elements when one is selected
    function showNiveaus(selectedElement) {
        const allSubNiveaux = document.querySelectorAll('#subniveau'); // Select all subniveau elements
        const allNiveaux = document.querySelectorAll('#nv'); // Select all divs with these IDs
        const allNiveaus = document.querySelectorAll('.niveaus'); // Select all niveaus containers
        const hiddenDiv = document.querySelector('.niveauextended');

        // Check if the selected subniveau is already active
        const isActive = selectedElement.classList.contains('active');

        // Reset all subniveau and niveaus
        allSubNiveaux.forEach(subniveau => {
            subniveau.classList.remove('active');
        });
        allNiveaus.forEach(niveau => {
            niveau.style.display = 'none'; // Hide all niveaus


        });
        allNiveaux.forEach(niveau => {
            niveau.classList.remove('active');
        });

        if (!isActive) {

            selectedElement.classList.add('active'); // Mark the clicked subniveau as active

            // Show the corresponding niveaus container
            const targetNiveausId = selectedElement.textContent.trim().toLowerCase() + '-niveaus'; // Match ID dynamically
            const targetNiveaus = document.getElementById(targetNiveausId);
            if (targetNiveaus) {
                targetNiveaus.style.display = 'block'; // Show the corresponding niveaus
            }
        }


    }

    // Expose the function to the global scope
    window.showNiveaus = showNiveaus;


    function redirectToDocument(level, subLevel, language) {
        const url = `${baseUrl}/Document?level=${encodeURIComponent(level)}&subLevel=${encodeURIComponent(subLevel)}&language=${encodeURIComponent(language)}`;
        window.location.href = url;
    }
    window.redirectToDocument = redirectToDocument;





    //documentpage 
    function filterDocuments() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const documentCards = document.querySelectorAll('.document-card');

        documentCards.forEach(card => {
            const cardText = card.textContent.toLowerCase();
            if (cardText.includes(searchInput)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Expose the function to the global scope
    window.filterDocuments = filterDocuments;




    //Dashboard script
    setTimeout(() => {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
        }
    }, 5000);

    const userSearchInput = document.getElementById('userSearch');
    const usersTable = document.getElementById('usersTable');

    // Check if the dashboard elements exist
    if (userSearchInput && usersTable) {
        userSearchInput.addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#usersTable tbody tr');

            rows.forEach(row => {
                let cells = row.querySelectorAll('td');
                let match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(filter));
                row.style.display = match ? '' : 'none';
            });
        });
    }

    const rows = document.querySelectorAll('#usersTable tbody tr');
    const rowsPerPage = 10;
    let currentPage = 1;
    const totalPages = Math.ceil(rows.length / rowsPerPage);

    const prevPageButton = document.getElementById('prevPage');
    const nextPageButton = document.getElementById('nextPage');
    const pageInfo = document.getElementById('pageInfo');

    // Function to update the visible rows
    function updateTable() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? '' : 'none';
        });

        // Update pagination controls
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
        prevPageButton.disabled = currentPage === 1;
        nextPageButton.disabled = currentPage === totalPages;
    }

    if (prevPageButton && nextPageButton && pageInfo) {
        // Event listeners for pagination buttons
        prevPageButton.addEventListener('click', function () {
            if (currentPage > 1) {
                currentPage--;
                updateTable();
            }
        });

        nextPageButton.addEventListener('click', function () {
            if (currentPage < totalPages) {
                currentPage++;
                updateTable();
            }
        });

        // Initialize the table
        updateTable();
    }


});

