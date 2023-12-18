// converting the code from "html" and importing it from a js file for convenience, so as not to copy it for each page

function htmlToJSFooter(){
  const footerElement = document.getElementById('footer');
  const firstPart = `
                <div class="left">
                    <h2>Links</h2>
                    <p><a href="https://www.uclansu.co.uk/">Student's Union</a></p>
                    <p><a href="https://github.com/Desire32/Assignment-1">GitHub</a></p>
                </div>
            `;
            const secondPart = `
                <div class="middle">
                    <h2>Contact</h2>
                    <p>Email: nmarkov@uclan.ac.uk</p>
                </div>
            `;
            const thirdPart = `
                <div class="right">
                    <h2>Location</h2>
                    <p>University of Central Lancashire Student's Union,</p>
                    <p>Fylde Road, Preston, PR1 7BY</p>
                    <p>Registered in England</p>
                    <p>Company Number : 7623917</p>
                    <p>Registered Charity Number: 1142616</p>
                </div>
            `;

            footerElement.innerHTML = firstPart + secondPart + thirdPart;
}
// initialisation of function
htmlToJSFooter();
