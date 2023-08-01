<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Welcome to the Lending-Investment System!
            </h1>

            <p class="mt-6 text-gray-500 leading-relaxed">
                Our Lending Platform provides a powerful and seamless opportunity to explore the world of lending. We've
                designed this platform to be user-friendly and reliable, serving as an ideal starting point for your
                financial ventures. With a focus on money lending, our system simplifies and enriches your experience in
                the lending area. We understand that financial endeavors should be enjoyable and creatively fulfilling,
                which is why we've carefully crafted this platform to offer a breath of fresh air. Embrace the world of
                lending with confidence, and we hope you find it to be an exceptional and rewarding experience.
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" id="mainIconPathAttribute" fill="#737373"></path> <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" id="mainIconPathAttribute" fill="#737373"></path> </svg>                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        Services
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    We offer a range of services, including mortgage options with flexible lengths, tailored to suit your preferences. Whether you're looking for a monthly or yearly payment plan, our platform has got you covered. Explore our mortgage solutions and find the ideal length that aligns with your financial goals.                   </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" id="IconChangeColor"> <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" id="mainIconPathAttribute" fill="#737373"></path> <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" id="mainIconPathAttribute" fill="#737373"></path> </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        Privacy
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    We employ strict security measures to protect your personal and financial information. We never share your data without your explicit consent, ensuring a secure and trustworthy experience throughout our platform.                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16" id="IconChangeColor"> <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" id="mainIconPathAttribute" fill="#737373"></path> <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" id="mainIconPathAttribute" fill="#737373"></path> </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        Credibility
                    </h2>
                </div>

                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                    Our platform adheres to regulatory standards, ensuring a secure and credible environment for your lending activities. Partner with us for a trustworthy and rewarding lending experience.                </p>
            </div>

            <div>
                <div class="flex items-center -mt-4">
                    <svg width="56" height="56" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor"> <path d="M16.2426 6.34319C16.6331 5.95266 17.2663 5.95266 17.6568 6.34319C18.0474 6.73371 18.0474 7.36688 17.6568 7.7574L7.75734 17.6569C7.36681 18.0474 6.73365 18.0474 6.34313 17.6569C5.9526 17.2664 5.9526 16.6332 6.34313 16.2427L16.2426 6.34319Z" fill="#737373" id="mainIconPathAttribute"></path> <path d="M9.87866 9.87872C9.09761 10.6598 7.83128 10.6598 7.05023 9.87872C6.26918 9.09767 6.26918 7.83134 7.05023 7.05029C7.83128 6.26924 9.09761 6.26924 9.87866 7.05029C10.6597 7.83134 10.6597 9.09767 9.87866 9.87872Z" fill="#737373" id="mainIconPathAttribute"></path> <path d="M14.1213 16.9498C14.9023 17.7308 16.1687 17.7308 16.9497 16.9498C17.7308 16.1687 17.7308 14.9024 16.9497 14.1214C16.1687 13.3403 14.9023 13.3403 14.1213 14.1214C13.3403 14.9024 13.3403 16.1687 14.1213 16.9498Z" fill="#737373" id="mainIconPathAttribute"></path> </svg>
                    <h2 class="ml-3 text-xl font-semibold text-gray-900">
                        Low Interest Rates
                    </h2>
                </div>

                <p class="mt-2 text-gray-500 text-sm leading-relaxed">
                    We strive to provide attractive rates that enable you to maximize your returns and make the most of your lending endeavors. Trust in our commitment to offering reliable and affordable lending options to help you achieve your financial goals.                </p>
            </div>
        </div>
    </div>
</template>
