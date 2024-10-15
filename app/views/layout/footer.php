<footer class="  bg-gradient-to-br from-purple-950 via-purple-950 to-black text-white mt-2">
    <div class="container mx-auto p-6 text-center">
        <p>&copy; <?php echo date('Y'); ?> My Blog. All rights reserved.</p>
    </div>
</footer>

<!-- Particles JS -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: { value: 45, density: { enable: true, value_area: 800 } },
            color: { value: "#ffffff" },
            shape: { type: "circle", stroke: { width: 0, color: "#000000" }, polygon: { nb_sides: 5 }, image: { src: "img/github.svg", width: 100, height: 100 } },
            opacity: { value: 0.5, random: false, anim: { enable: false, speed: 0.3, opacity_min: 0.1, sync: false } },
            size: { value: 3, random: true, anim: { enable: false, speed: 10, size_min: 0.1, sync: false } },
            line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4, width: 1 },
            move: { enable: true, speed: 3, direction: "none", random: false, straight: false, out_mode: "out", bounce: false, attract: { enable: false, rotateX: 600, rotateY: 1200 } }
        },
        interactivity: {
            detect_on: "canvas",
            events: { onhover: { enable: true, mode: "repulse" }, onclick: { enable: true, mode: "push" }, resize: true },
            modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } }
        },
        retina_detect: true
    });
</script>

<script>

    // Preview image on selection
    const imageInput = document.getElementById('image');
    const imageLabel = imageInput.closest('label');

    imageInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imageLabel.style.backgroundImage = `url(${e.target.result})`;
                imageLabel.style.backgroundSize = 'cover';
                imageLabel.style.backgroundPosition = 'center';
                // Don't clear the innerHTML, just hide the content
                imageLabel.firstElementChild.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });

</script>

<!-- JavaScript to Confirm Delete -->
<script>
    function confirmDelete(blogId) {
        if (confirm('Are you sure you want to delete this blog post?')) {
            window.location.href = `/my-blog/blog/delete?id=${blogId}`;
        }
    }
</script>



<!-- JavaScript to Toggle Mobile Menu -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

<script>
    // Close button functionality
    document.querySelectorAll('.close-button').forEach(button => {
        button.addEventListener('click', () => {
            const alertDiv = button.closest('div[role="alert"]');
            if (alertDiv) {
                alertDiv.style.display = 'none';
            }
        });
    });

    // Auto-hide toast notifications after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('[role="alert"]').forEach(alert => {
            alert.style.display = 'none';
        });
    }, 6000); 
</script>


</body>

</html>