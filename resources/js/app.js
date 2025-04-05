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

            // Debugging: Log the calculated rotation values
            console.log(`rotateX: ${rotateX}, rotateY: ${rotateY}`);

            image.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`; // Apply 3D rotation
            image.style.transition = 'none'; // Disable transition during movement
        });

        image.addEventListener('mouseleave', () => {
            
            image.style.transform = 'rotateX(0) rotateY(0)'; // Reset on mouse leave
            image.style.transition = 'transform 0.3s ease'; // Smooth reset
        });
    });
});

