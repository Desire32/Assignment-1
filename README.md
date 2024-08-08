# Overview:
This project involved developing a responsive web application for the Student’s Union Shop at UCLan. The application initially utilized HTML, CSS, and JavaScript for the front end and was later enhanced with PHP to manage dynamic content and backend integration.

# Key Requirements:

  1. Design and UI/UX:
        Responsive Layout: CSS ensured a responsive layout, providing optimal usability across various devices.
        Consistent Navigation: A consistent navigation structure was implemented, featuring a logo and menu on all views to enhance user experience.

  2. Functionality:
        Core Features: The application includes four main views—Home, Products, Cart, and Item. Initially, product data was hardcoded in HTML, but it was transitioned to dynamically retrieve data from a MySQL database using PHP.
        User Management: Functionality was added for user registration and login, with sessions to track logged-in users and facilitate purchases.
        Dynamic Content: The application dynamically displays products, special offers, and user reviews from the database. A search function was implemented using PHP and JavaScript to improve usability.

  3. Security and Accessibility:
        Secure Password Handling: Passwords are securely stored using bcrypt hashing and salting techniques.
        User Feedback: The application provides clear and user-friendly feedback, such as error messages during login or issues when adding items to the cart.
        Error Handling: A custom 404 error page was created to guide users when they encounter broken links or unavailable pages.

  4. Tools and Technologies:
        Frontend: HTML and CSS were used for structure and styling, with JavaScript providing interactivity.
        Backend: PHP was utilized for server-side processing, while MySQL managed the database.
        Data Storage: localStorage and sessionStorage were used for handling temporary client-side data, with POST/GET methods employed for secure data transfer between pages.

# Additional Features:
The design was made fully responsive to ensure a seamless user experience across different devices.
A product review system was added, allowing logged-in users to leave ratings and comments.
The search functionality was enhanced to improve product discovery, and the user experience was personalized based on login status.
