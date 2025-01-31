document.addEventListener('DOMContentLoaded', () => {
  const tagElements = document.querySelectorAll('.tag-item');
  const portfolioContainer = document.querySelector('.portfolio-container');

  tagElements.forEach(tag => {
    tag.addEventListener('click', () => {
      const tagSlug = tag.dataset.slug;

      // Highlight active tag
      tagElements.forEach(tag => tag.classList.remove('active'));
      tag.classList.add('active');

      // AJAX request
      fetch(wpAjax.ajax_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action: 'filter_portfolios',
          tag_slug: tagSlug,
        }),
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            portfolioContainer.innerHTML = data.data.html;
          } else {
            portfolioContainer.innerHTML = `<p>${data.data.message}</p>`;
          }
        })
        .catch(error => {
          console.error('AJAX error:', error);
          portfolioContainer.innerHTML = '<p>Error fetching data.</p>';
        });
    });
  });
});
