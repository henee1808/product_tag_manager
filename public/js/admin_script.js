$(document).ready(function () {
    $('.rightsidebar ul > li').click(function (e) {
      e.stopPropagation(); 
  
      var isOpen = $(this).find('.sub-menu').is(':visible');
  
      $('.rightsidebar ul > li .sub-menu').slideUp(400);
  
      if (!isOpen) {
        $(this).find('.sub-menu').first().slideDown(400);
      }
    });
  
    $('.menu-toggle-bar').click(function (e) {
      e.stopPropagation();
      $('.rightsidebar').toggleClass('active');
    });
  
    $('body').click(function () {
      $('.rightsidebar').removeClass('active');
      $('.sub-menu').slideUp(300);
    });
  
    $('.rightsidebar').click(function (e) {
      e.stopPropagation();
    });
  });
  
  jQuery(document).ready(function($) {
    $('.menu-toggle-bar').on('click', function() {
      $('.sidebar_menu').toggleClass('sidebar_toggle');
      $('.rightsidebar.position-sticky').toggleClass('rightsidebar_toggle');
      $('.dashboard-content').toggleClass('full-dashboard-content'); 
    });
  });


/*   uplode document*/

// $(function () {
//     $('#imageUpload').change(function () {
//         let f = this.files[0], t = f?.type;
//         if (!['image/png', 'image/jpeg', 'image/gif'].includes(t))
//             return $('.upload-area').html('<p style="color:red;font-weight:600;">Unsupported file type.</p><p style="color:#555;font-size:14px;">Only <b>PNG</b>, <b>JPG</b>, or <b>GIF</b> formats are allowed.</p>');
//         let r = new FileReader();
//         r.onload = e => $('.upload-area').html(`<img src="${e.target.result}" style="max-width:100%;height:auto;border-radius:10px;">`);
//         r.readAsDataURL(f);
//     });
// });


// Show popup on form submission or Add Product button


// $(document).ready(function () {
//     // Show popup and overlay
//     $('.btn_2[type="submit"]').click(function (e) {
//         e.preventDefault();
//         $('#popup').fadeIn();
//         $('body').addClass('overlay-active').css('overflow', 'hidden');
//     });

//     // Hide popup and remove overlay
//     $('#popup .btn_2').click(function () {
//         $('#popup').fadeOut();
//         $('body').removeClass('overlay-active').css('overflow', 'auto');
//     });
//     // Redirect to product list (optional)
//     $('#goToProductList').click(function () {
//         window.location.href = "product-list.html";
//     });

//     $('#popupClose').click(function () {
//         $('#popup').fadeOut();
//         $('body').removeClass('overlay-active').css('overflow', 'auto');
//     });
// });

// $(document).ready(function () {
//     // Open logout popup and add overlay-active class
//     $('#sidebarLogout, #sidebarLogout2').click(function (e) {
//         e.preventDefault();
//         $('#logoutPopup').fadeIn();
//         $('body').addClass('overlay-active');
//     });

//     // Close popup and remove overlay-active class
//     $('#cancelLogout').click(function () {
//         $('#logoutPopup').fadeOut();
//         $('body').removeClass('overlay-active');
//     });
// });


// Show popup on form submission or Add Category button
// $(document).ready(function () {
//     // Show popup and overlay
//     $('.btn_2[type="submit"]').click(function (e) {
//         e.preventDefault();
//         $('#popup').fadeIn();
//         $('body').addClass('overlay-active').css('overflow', 'hidden');
//     });

//     // Hide popup and remove overlay
//     $('#popup .btn_2').click(function () {
//         $('#popup').fadeOut();
//         $('body').removeClass('overlay-active').css('overflow', 'auto');
//     });
//     // Redirect to category list (optional)
//     $('#goToList').click(function () {
//         window.location.href = "category-list.html"; // Replace with actual URL
//     });

//     $('#popupClose').click(function () {
//         $('#popup').fadeOut();
//         $('body').removeClass('overlay-active').css('overflow', 'auto');
//     });

// });



// view detail popup

$(document).ready(function () {
    // Show popup on eye icon click
    $(document).on('click', '.seller-detail-popup', function () {
        $('#sellerPopup').fadeIn();
        $('body').addClass('overlay-active').css('overflow', 'hidden');
    });

    // Close popup on any button inside it
    $('#sellerPopup .btn_2, #sellerPopupClose').on('click', function () {
        $('#sellerPopup').fadeOut();
        $('body').removeClass('overlay-active').css('overflow', 'auto');
    });

    // Redirect to Seller List page
    $('#goToSellerList').click(function () {
        window.location.href = "seller-list.html"; // Update if needed
    });
});

//  reject popup

$(document).ready(function () {
    // Show popup on eye icon click
    $(document).on('click', '#verifyAnother', function () {
        $('#rejectPopup').fadeIn();
        $('body').addClass('overlay-active').css('overflow', 'hidden');
    });

    // Close popup on any button inside it
    $('#rejectPopup .btn_2, #sellerPopupClose').on('click', function () {
        $('#rejectPopup').fadeOut();
        $('body').removeClass('overlay-active').css('overflow', 'auto');
    });


});


// 7. delete category popup
$(document).ready(function () {
    // Show popup when delete icon is clicked
    $(document).on('click', '.action-delete', function (e) {
        e.preventDefault();
        $('#del-popup').fadeIn();
        $('body').addClass('overlay-active').css('overflow', 'hidden');
    });

    // Hide popup on buttons
    $('#del-popup .btn_2, #popupClose').click(function () {
        $('#del-popup').fadeOut();
        $('body').removeClass('overlay-active').css('overflow', 'auto');
    });

    $('#cancelDelete').on('click', function () {
        $('.deletePopup').fadeOut();
        $('body').removeClass('overlay-active').css('overflow', 'auto');
    });
    
    $('#confirmDelete').on('click', function () {
        $('.deletePopup').fadeOut();
        $('body').removeClass('overlay-active').css('overflow', 'auto');
    });
});



// Data for each period
const weekData = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    datasets: [{
    label: 'Sales',
    data: [120, 190, 300, 500, 200, 300, 400],
    borderColor: '#FE816D',
    backgroundColor: 'transparent',
    fill: true,
    pointRadius: 4,
    pointBackgroundColor: '#FF715B',
    borderWhidth: 2
    }]
};

const monthData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
    label: 'Sales',
    data: [0, 500, 1000, 400, 1800, 3500, 2500, 4500, 1400, 3400, 2300, 4800],
    borderColor: '#FE816D',
    backgroundColor: 'transparent',
    fill: true,
    pointRadius: 4,
    pointBackgroundColor: '#FF715B',
    borderWhidth: 2
    }]
};

const yearData = {
    labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
    datasets: [{
    label: 'Sales',
    data: [12000, 15000, 17000, 10000, 14000, 16000, 14000, 20000],
    borderColor: '#FE816D',
    backgroundColor: 'transparent',
    fill: true,
    pointRadius: 4,
    pointBackgroundColor: '#FF715B',
    borderWhidth: 2
    }]
};

// Initialize the chart
const ctx = document.getElementById('salesChart').getContext('2d');
let salesChart = new Chart(ctx, {
    type: 'line',
    data: monthData,
    options: {
    responsive: true,
    plugins: {
        legend: {
        display: false,
        labels: {
            font: {
            family: "'poppins', sans-serif", // Change to your desired font
            size: 16,
            weight: 'bold'
            }
        }
        },
        tooltip: {
        bodyFont: {
            family: "'poppins', sans-serif",
            size: 14
        },
        titleFont: {
            family: "'poppins', sans-serif",
            size: 16,
            weight: 'bold'
        }
        }
    },
    scales: {
        x: {
        grid: { display: true },
        title: { display: false },
        ticks: {
            font: {
            family: "'poppins', sans-serif",
            size: 14
            },
            autoSkip: false,
            autoSkipPadding: 30,
            maxRotation: 0,
            minRotation: 0
        }
        },
        y: {
        grid: { display: false },
        beginAtZero: true,
        title: { display: false },
        ticks: {
            font: {
            family: "'poppins', sans-serif",
            size: 14
            }
        }
        }
    }
    }
});

// Button event listeners
document.getElementById('btn-week').addEventListener('click', function () {
    salesChart.data = weekData;
    salesChart.update();
    setActiveButton(this);
});

document.getElementById('btn-month').addEventListener('click', function () {
    salesChart.data = monthData;
    salesChart.update();
    setActiveButton(this);
});

document.getElementById('btn-year').addEventListener('click', function () {
    salesChart.data = yearData;
    salesChart.update();
    setActiveButton(this);
});

function setActiveButton(activeBtn) {
    document.querySelectorAll('.graph_btn .btn').forEach(btn => {
    btn.classList.remove('btn-danger', 'active');
    btn.classList.add('btn-outline-secondary');
    });
    activeBtn.classList.remove('btn-outline-secondary');
    activeBtn.classList.add('btn-danger', 'active');
}
// Earnings data for each period
const earningsWeekData = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    datasets: [{
    label: 'Earnings',
    data: [1200, 1900, 800, 1500, 3200, 2700, 4200],
    backgroundColor: 'rgba(254, 129, 109, 0.7)',
    barThickness: 10
    }]
};
const earningsMonthData = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
    label: 'Earnings',
    data: [1200, 1900, 800, 1500, 3200, 2700, 4200, 5700, 3200, 4000, 3500, 5200],
    backgroundColor: 'rgba(254, 129, 109, 0.7)',
    barThickness: 10
    }]
};
const earningsYearData = {
    labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024'],
    datasets: [{
    label: 'Earnings',
    data: [12000, 15000, 17000, 10000, 14000, 16000, 14000, 20000],
    backgroundColor: 'rgba(254, 129, 109, 0.7)',
    barThickness: 10
    }]
};
const earningsCtx = document.getElementById('earningsChart').getContext('2d');
let earningsChart = new Chart(earningsCtx, {
    type: 'bar',
    data: earningsMonthData,
    options: {
    responsive: true,
    plugins: {
        legend: { display: false },
        tooltip: {
        callbacks: {
            label: function (context) {
            return '₹' + context.parsed.y;
            }
        }
        }
    },
    scales: {
        x: {
        grid: { display: false },
        title: { display: false },
        ticks: {
            font: {
            family: "'poppins', sans-serif",
            size: 14
            }
        }
        },
        y: {
        grid: { display: false },
        beginAtZero: true,
        title: { display: false },
        ticks: {
            font: {
            family: "'poppins', sans-serif",
            size: 14
            },
            callback: function (value) {
            return '₹' + value;
            }
        }
        }
    }
    }
});

document.getElementById('earnings-period').addEventListener('change', function () {
    let val = this.value;
    if (val === 'week') {
    earningsChart.data = earningsWeekData;
    } else if (val === 'month') {
    earningsChart.data = earningsMonthData;
    } else if (val === 'year') {
    earningsChart.data = earningsYearData;
    }
    earningsChart.update();
});

// Category Pie Chart
new Chart(document.getElementById('categoryChart').getContext('2d'), {
    type: 'pie',
    data: {
    labels: ['Fashion', 'Vegetables', 'Electronics'],
    datasets: [{
        data: [35, 30, 45],
        backgroundColor: ['#50CD89', '#FF9800', '#3E97FF']
    }]
    },
    options: {
    responsive: false,
    plugins: {
        legend: { display: false },
        datalabels: {
        color: '#fff',
        font: {
            family: "'Roboto Slab', serif",
            weight: '400',
            size: 20
        },
        formatter: function (value, context) {
            const label = context.chart.data.labels[context.dataIndex];
            return value + '%\n' + label;
        },
        align: 'center',
        anchor: 'center',
        textAlign: 'center'
        }
    }
    },
    plugins: [ChartDataLabels]
});


/*   uplode document*/

$(function () {
    $('#imageUpload').change(function () {
        let f = this.files[0], t = f?.type;
        if (!['image/png', 'image/jpeg', 'image/gif'].includes(t))
            return $('.upload-area').html('<p style="color:red;font-weight:600;">Unsupported file type.</p><p style="color:#555;font-size:14px;">Only <b>PNG</b>, <b>JPG</b>, or <b>GIF</b> formats are allowed.</p>');
        let r = new FileReader();
        r.onload = e => $('.upload-area').html(`<img src="${e.target.result}" style="max-width:100%;height:auto;border-radius:10px;">`);
        r.readAsDataURL(f);
    });
});





