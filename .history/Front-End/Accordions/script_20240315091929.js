// document.addEventListener('DOMContentLoaded', function() {
//     const accordionHeaders = document.querySelectorAll('.accordion-header');

//     accordionHeaders.forEach(header => {
//         header.addEventListener('click', function() {
//             const accordionItem = this.parentElement;
//             const content = accordionItem.querySelector('.accordion-content');
//             const isOpen = content.style.display === 'block';

//             // Tutup semua accordion
//             accordionHeaders.forEach(item => {
//                 item.parentElement.querySelector('.accordion-content').style.display = 'none';
//             });

//             // Buka accordion yang di klik
//             if (!isOpen) {
//                 content.style.display = 'block';
//             }
//         });
//     });
// });
