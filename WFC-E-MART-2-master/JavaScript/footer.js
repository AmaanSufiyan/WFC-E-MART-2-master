function createFooter() {
    const footerSection = document.createElement('section');
    footerSection.classList.add('footer');
  
    const footerContainer = document.createElement('div');
    footerContainer.classList.add('footer-box-container');
  
    // Create the Quick Links box
    const quickLinksBox = document.createElement('div');
    quickLinksBox.classList.add('box');
    const quickLinksTitle = document.createElement('h3');
    quickLinksTitle.textContent = "Quick Links";
    quickLinksBox.appendChild(quickLinksTitle);
  
    const quickLinks = [
      { href: "../User pages/home.html", text: "Home" },
      { href: "../User pages/products.html", text: "Products" },
      { href: "../User pages/wishlist.html", text: "My Lists" },
      { href: "../User pages/order.html", text: "Track My Order" }
    ];
  
    for (const link of quickLinks) {
      const quickLink = document.createElement('a');
      quickLink.href = link.href;
      quickLink.innerHTML = `<i class="fa-solid fa-arrow-right"></i> ${link.text}`;
      quickLinksBox.appendChild(quickLink);
    }
  
    // Create the Categories box (similar structure)
    const categoriesBox = document.createElement('div');
    categoriesBox.classList.add('box');
    const categoriesTitle = document.createElement('h3');
    categoriesTitle.textContent = "Categories";
    categoriesBox.appendChild(categoriesTitle);
  
    const categories = [
      { href: "#", text: "Grocery" },
      { href: "#", text: "Beverages" },
      { href: "#", text: "Household" },
      { href: "#", text: "Vegetables" },
      { href: "#", text: "Fruits" }
    ];
  
    for (const category of categories) {
      const categoryLink = document.createElement('a');
      categoryLink.href = category.href;
      categoryLink.innerHTML = `<i class="fa-solid fa-arrow-right"></i> ${category.text}`;
      categoriesBox.appendChild(categoryLink);
    }
  
    // Create the Useful Links box (similar structure)
    const usefulLinksBox = document.createElement('div');
    usefulLinksBox.classList.add('box');
    const usefulLinksTitle = document.createElement('h3');
    usefulLinksTitle.textContent = "Useful Links";
    usefulLinksBox.appendChild(usefulLinksTitle);
  
    const usefulLinks = [
      { href: "#", text: "Privacy Policy" },
      { href: "#", text: "FAQ" },
      { href: "#", text: "Terms and Condition" }
    ];
  
    for (const link of usefulLinks) {
      const usefulLink = document.createElement('a');
      usefulLink.href = link.href;
      usefulLink.innerHTML = `<i class="fa-solid fa-arrow-right"></i> ${link.text}`;
      usefulLinksBox.appendChild(usefulLink);
    }
  
    // Create the Newsletter box
    const newsletterBox = document.createElement('div');
    newsletterBox.classList.add('box');
    const newsletterTitle = document.createElement('h3');
    newsletterTitle.textContent = "Newsletter";
    newsletterBox.appendChild(newsletterTitle);
  
    const newsletterText = document.createElement('p');
    newsletterText.textContent = "subscribe for latest updates";
    newsletterBox.appendChild(newsletterText);
  
    const newsletterForm = document.createElement('form');
    newsletterForm.action = "";
    const emailInput = document.createElement('input');
    emailInput.type = "email";
    emailInput.placeholder = "enter your email";
    const submitButton = document.createElement('input');
    submitButton.type = "submit";
    submitButton.classList.add('subscribe-btn');
    submitButton.value = "subscribe";
    newsletterForm.appendChild(emailInput);
    newsletterForm.appendChild(submitButton);
    newsletterBox.appendChild(newsletterForm);
  
    const paymentImg = document.createElement('img');
    paymentImg.classList.add('payment');
    paymentImg.src = "../Images/payment.png";
    paymentImg.alt = "";
    newsletterBox.appendChild(paymentImg);
  
    // Append all boxes to the footer
    footerContainer.appendChild(quickLinksBox);
    footerContainer.appendChild(categoriesBox);
    footerContainer.appendChild(usefulLinksBox);
    footerContainer.appendChild(newsletterBox);
    
    // Add the footer container to the footer section
    footerSection.appendChild(footerContainer);
    
    // Create the credit section
    const creditSection = document.createElement('section');
    creditSection.classList.add('credit');
    creditSection.textContent = "Copyright © 2024 Cool Nerds. All rights Reserved.";
    
    // Append the credit section to the footer
    footerSection.appendChild(creditSection);
    
    // Add the entire footer section to the body
    document.body.appendChild(footerSection);
    }
    
    // Call the function to create and add the footer
    createFooter();  