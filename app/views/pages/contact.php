
<main class="container mx-auto px-6 py-12">
 
   <section class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Contact Us</h1>
      <p class="text-lg text-gray-600 leading-relaxed">
         Have questions, feedback, or just want to say hello? We’d love to hear from you! Fill out the form below, and we’ll get back to you as soon as possible.
      </p>
   </section>

  
   <section class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
      <form action="contact_submit.php" method="POST">
         <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2">
           
            <div>
               <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
               <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
          
            <div>
               <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
               <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
         </div>

      
         <div class="mb-6">
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
         </div>

        
         <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
         </div>

 
         <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
               Send Message
            </button>
         </div>
      </form>
   </section>
</main>


