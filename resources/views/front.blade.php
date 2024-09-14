<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Explore top companies actively hiring in IT Services, BFSI, and more sectors.">
    <title>Featured Companies Slider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .slider-transition {
            transition: transform 0.5s ease;
        }

        .active-category {
            background-color: #2563eb;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50">

    <section class="w-full max-w-6xl mx-auto p-4">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Featured Companies Actively Hiring</h2>

        <!-- Tabs -->
        <nav class="flex justify-center space-x-4 mb-6" aria-label="Company categories">
            <button id="category-all" data-category="all"
                class="px-5 py-2 rounded-full border border-gray-300 hover:bg-gray-100 focus:ring-2 ring-blue-600 focus:outline-none active-category">All</button>
            <button id="category-it" data-category="it"
                class="px-5 py-2 rounded-full border border-gray-300 hover:bg-gray-100 focus:ring-2 ring-blue-600 focus:outline-none">IT
                Services</button>
            <button id="category-bfsi" data-category="bfsi"
                class="px-5 py-2 rounded-full border border-gray-300 hover:bg-gray-100 focus:ring-2 ring-blue-600 focus:outline-none">BFSI</button>
        </nav>

        <!-- Slider -->
        <div class="relative">
            <div id="company-slider"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 overflow-hidden slider-transition">
                <!-- Company cards will be dynamically inserted here -->
            </div>

            <!-- Prev/Next Buttons -->
            <button id="prev-slide" aria-label="Previous Slide"
                class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg focus:ring-2 ring-blue-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="next-slide" aria-label="Next Slide"
                class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg focus:ring-2 ring-blue-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    <script>
        const companyData = [{
                name: 'ICICI Bank',
                logo: '("{{asset('assets/img/1288.gif')}}")',
                rating: 4.0,
                reviews: '35.1K+',
                description: 'Leading private sector bank in India.',
                category: 'bfsi'
            },
            {
                name: 'Empower',
                logo: 'https://via.placeholder.com/100x50',
                rating: 3.7,
                reviews: '241',
                description: "We're a financial services company.",
                category: 'bfsi'
            },
            {
                name: 'Bread Financial',
                logo: 'https://via.placeholder.com/100x50',
                rating: 4.4,
                reviews: '180',
                description: 'A tech-forward financial services company.',
                category: 'bfsi'
            },
            {
                name: 'Standard Chartered',
                logo: 'https://via.placeholder.com/100x50',
                rating: 3.8,
                reviews: '4.1K+',
                description: 'Expand your horizons.',
                category: 'bfsi'
            },
            {
                name: 'JPMorgan Chase',
                logo: 'https://via.placeholder.com/100x50',
                rating: 4.1,
                reviews: '15K+',
                description: 'Leader in financial services.',
                category: 'bfsi'
            },
            {
                name: 'Infosys',
                logo: 'https://via.placeholder.com/100x50',
                rating: 4.0,
                reviews: '50K+',
                description: 'Global leader in IT services.',
                category: 'it'
            },
            {
                name: 'TCS',
                logo: 'https://via.placeholder.com/100x50',
                rating: 4.2,
                reviews: '60K+',
                description: 'Top IT services company in India.',
                category: 'it'
            },
        ];

        let currentIndex = 0;
        let activeCategory = 'all';

        // Function to filter company data by category
        function filterCompanies(category) {
            return companyData.filter(company => category === 'all' || company.category === category);
        }

        function renderSlider(companies) {
            const slider = document.getElementById('company-slider');
            slider.innerHTML = '';

            for (let i = 0; i < 4; i++) {
                const companyIndex = (currentIndex + i) % companies.length;
                const company = companies[companyIndex];

                const companyCard = `
          <article class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
            <img src="${company.logo}" alt="${company.name} logo" class="w-24 h-12 object-contain mb-4" />
            <h3 class="font-bold text-xl mb-2 text-gray-800">${company.name}</h3>
            <div class="flex items-center mb-2">
              <span class="text-yellow-400 mr-1">★</span>
              <span class="font-bold text-gray-800 mr-2">${company.rating}</span>
              <span class="text-gray-500 text-sm">${company.reviews} reviews</span>
            </div>
            <p class="text-sm text-gray-600 mb-4">${company.description}</p>
            <button class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-200 transition-colors focus:ring-2 ring-blue-600 focus:outline-none">
              View jobs
            </button>
          </article>
        `;
                slider.innerHTML += companyCard;
            }
        }

        function nextSlide() {
            const companies = filterCompanies(activeCategory);
            currentIndex = (currentIndex + 1) % companies.length;
            renderSlider(companies);
        }

        function prevSlide() {
            const companies = filterCompanies(activeCategory);
            currentIndex = (currentIndex - 1 + companies.length) % companies.length;
            renderSlider(companies);
        }

        // Event listener to handle category change
        document.querySelectorAll('button[data-category]').forEach(button => {
            button.addEventListener('click', function() {
                activeCategory = this.dataset.category;
                currentIndex = 0;
                renderSlider(filterCompanies(activeCategory));

                // Toggle active button style
                document.querySelectorAll('button[data-category]').forEach(btn => btn.classList.remove(
                    'active-category'));
                this.classList.add('active-category');
            });
        });

        document.getElementById('next-slide').addEventListener('click', nextSlide);
        document.getElementById('prev-slide').addEventListener('click', prevSlide);

        // Initial render with all companies
        renderSlider(filterCompanies('all'));
    </script>

</body>

</html>
