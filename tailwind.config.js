/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'white-70': 'rgba(255, 255, 255, 0.7)',
      },
    },
    screens: {
      'sm': '640px', // Small screens, mobile phones
      'md': '768px', // Medium screens, tablets
      'lg': '1024px', // Large screens, laptops
      'xl': '1280px', // Extra large screens, desktops
      '2xl': '1536px', // Extra extra large screens, wide desktops
      // Add custom screen sizes as needed
      'ph1': '320px', // Example of a custom screen size
      'ph2': '375px', // Example of a custom screen size
      'ph3': '425px', // Example of a custom screen size
    },
  },
  plugins: [],
}