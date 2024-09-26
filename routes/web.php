<?php

use App\Models\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\BeneficiaryApplicationController;
use App\Http\Controllers\PartnerApplicationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Auth;
use App\Models\Download;
use App\Models\Volunteer;
use App\Models\View;
use App\Models\Gallery;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index']);


Route::get('homepage', function () {
    return view('homepage');
});

Route::get('who-we-are', function () {
    $downloads = Download::all();
    $teams = [
        [
            'name' => 'Adesuwa Nosakhare',
            'position' => 'Corporate Partnership Manager',
            'list_image' => '/images/team_1.png', 
            'image' => '/images/team_detail_1.png', 
            'content' => "Ade is a Management consultant with an MBA from the University of California, Berkeley. She has a wealth of experience in the semiconductor industry, working as a process engineer and quality program manager in the United States.  At The Special Youth Foundation, she works closely with the executive team on corporate strategy and relationship building.<br><br>
                She holds a BSc. in Chemical Engineering from the University of Maryland and an MSc. in Petroleum Engineering from the University of Oklahoma. Ade is passionate about operational business excellence and committed to supporting the education and development of children of differing abilities and socioeconomic backgrounds."
            , 
            'link' => 'https://www.linkedin.com/in/adenosakhare/'
        ],
        
        [
            'name' => 'Ayobamidele Shodipe',
            'position' => 'Foundation Manager',
            'list_image' => '/images/team_2.png', 
            'image' => '/images/team_detail_2.png', 
            'content' => "Ayobamidele currently serves as the Foundation and Operations Manager at The Special Foundation. She oversees the general operations management, as well as programs and project management of the foundation. She curates, plans, executes, and implements the foundation’s cardinal programs.<br><br>
                She holds a BSc in Animal Nutrition from the Federal University of Agriculture, Abeokuta, an MSc in Industrial Labour and Relations from the University of Lagos, Akoka, and has over 5 years of experience with a proven track record in administrative management, operations, program planning and execution, and customer service."
            ,
            'link' => 'https://www.linkedin.com/in/ayobamidele-ms/'
        ],
        
        [
            'name' => 'Cynthia Amakiri',
            'position' => 'Programs Manager',
            'list_image' => '/images/team_3.png', 
            'image' => '/images/team_detail_3.png', 
            'content' => "Cynthia is the Programs Manager of the Special Foundation.  She is also the co-founder of ACEYSA; a youth-led NGO focused on poverty alleviation.<br><br>
                Although Cynthia has worked in different sectors including the finance and medical sector, she has devoted the past few years of her life to human capital development, health and wellness programs and improving educational opportunities for vulnerable people in society as she believes that everyone deserves a chance at a better life. She does these by planning and executing projects that ensure children have basic education and better learning conditions and youths are empowered through education or skill acquisition."
            , 
            'link' => 'https://www.linkedin.com/in/cynthia-amakiri-b679418a/'
        ],
        
        [
            'name' => 'Feyikoya Kamson',
            'position' => 'Innovation Manager',
            'list_image' => '/images/team_4.png', 
            'image' => '/images/team_detail_4.png', 
            'content' => "Feyikoya Kamson is the Innovation Manager at the Foundation. She is an IT nerd turned Travel enthusiast. With a degree in Industrial Physics and over 6years work experience as a Business consultant for notable companies like IBM UK, Huawei Nigeria and Etisalat Nigeria, Feyikoya founded FNP Travel- A Travel Company committed to helping others see the world differently.<br><br>
                She found a way to merge her passion for helping people and creating aesthetically pleasing storytelling content. Feyikoya strongly believes in self actualisation and is passionate about driving the message."
            , 
            'link' => 'https://www.linkedin.com/in/feyikoya-kamson-66a31870/?originalSubdomain=ng'
        ],
        
        [
            'name' => 'Gloria Odigili',
            'position' => 'Administrative & Engagement Manager',
            'list_image' => '/images/team_5.png', 
            'image' => '/images/team_detail_5.png', 
            'content' => "Gloria currently serves as the Administrative and Engagement Manager at The Special Foundation, where she plays a pivotal role in managing all administrative operations and curating content to boost engagement across various platforms.<br><br>
                A committed graduate of Covenant University, Gloria brings a wealth of experience with a solid background in data management, product management, and client relationship management, spanning over 5 years. Her versatile professional journey across multiple industries has honed her ability to approach daily operations with a critical, strategic, and creative mindset."
            , 
            'link' => 'https://www.linkedin.com/in/gloria-odigili-8353441a5/'
        ],
        
        [
            'name' => 'Roli Edoja',
            'position' => 'Partnership Manager',
            'list_image' => '/images/team_6.png', 
            'image' => '/images/team_detail_6.png', 
            'content' => "Meet Roli, the dynamic Head of Partnerships at our Special Foundation, tasked with seeking out, recruiting, and continually developing existing partnerships.  Armed with a B.Sc. in Mass Communication and a rich four-year history in Marketing, client relations, brand management, and creative direction.<br><br>
                Beyond her impressive professional background, Roli has a passion for making a meaningful impact, she thrives on challenges that spark her creativity and innovative ideas. Outside the world of partnerships and marketing, Roli enjoys her free time binge-watching historical drama, action, or fantasy series."
            , 
            'link' => 'https://www.linkedin.com/in/roli-edoja-98607a263/'
        ],
        
        [
            'name' => 'Tomi Popoola',
            'position' => 'Head of Strategy',
            'list_image' => '/images/team_7.png', 
            'image' => '/images/team_detail_7.png', 
            'content' => "Strategic whiz who turns challenges into seamless collaboration. Expert at driving teamwork and boosting communication with style. A relationship builder who keeps teams sharp and adaptable. Master communicator and inventive problem-solver with a flair for strategic planning. Known for charming execs and partners while delivering stellar results.", 
            'link' => 'https://www.linkedin.com/in/olatomipopoola'
        ],
        
        [
            'name' => 'EseOghene Okagbare',
            'position' => 'Head of Media Operations',
            'list_image' => '/images/team_8.png', 
            'image' => '/images/team_detail_8.png', 
            'content' => "EseOghene brings diverse experience across education, banking, and technology sectors, driving innovative media strategies and brand awareness with his technical knowledge and creative vision. Holding a Bachelor's in Computer Science and multiple tech certifications, Elson has advanced rapidly, showcasing his versatility and leadership. He rose to Head Customer Service Officer in banking before becoming a Senior Software Engineer at Interswitch Nigeria Limited. There, he discovered his passion for media, directing a film and a documentary, and later founded a wedding media company and corporate media enterprise. He has produced commercials, documentaries, and films for diverse clients.", 
            'link' => 'https://www.linkedin.com'
        ],
    ];
    $boards = [
        [
            'name' => 'Seyi Akinwale', 
            'list_image' => '/images/ambassador_10.png', 
            'image' => '/images/detail_10.png', 
            'content' => "Seyi Akinwale, Senior VP at GE Vernova’s Financial Services, has 18+ years of experience in infrastructure project development in Sub Saharan Africa. Skilled in debt and equity markets, he secures financing for complex projects. Seyi has held roles in GE’s Industrial Finance and Treasury Capital Markets. Previously, he was a Director at PwC, growing the Deals practice, and a VP at FCMB Capital. Seyi holds degrees from Obafemi Awolowo University, Cranfield University, and the University of Chicago Booth School of Business. He is a fellow of the Association of Certified Chartered Accountants of UK & Ireland and the Institute of Chartered Accountants of Nigeria. Seyi serves on multiple boards, including as a non-executive Director of the Ibadan Electricity Distribution Company. Passionate about infrastructural development and education, he founded the Special Foundation to empower gifted African children through education and mentorship.", 
            'link' => 'https://www.linkedin.com/in/seyi-akinwale/'
        ],

        [
            'name' => 'Abimbola Ayinde', 
            'list_image' => '/images/ambassador_1.png', 
            'image' => '/images/detail_1.png', 
            'content' => "Abimbola is the GM Upstream Commercial and Corporate Finance at FIRST Exploration & Petroleum Development Company Limited (FIRST E&P). Previously, she worked as a Vice President in Investment Banking at FCMB Capital Markets Limited and as a General Manager at A3 & O Limited. 
                <br><br>
                Abimbola holds an MBA from Manchester Business School in the UK and a bachelor's degree from the University of Ibadan in Nigeria. She has extensive experience in investment banking, strategic business planning, and management consulting. 
                <br><br>
                Abimbola is dedicated to supporting the education and wellbeing of children with absent or underprivileged parents, volunteering and advocating for multiple NGOs.", 
            'link' => 'https://www.linkedin.com/in/abimbola-ayinde-0ab79018/'
        ],

        [
            'name' => 'Damilola Akinwale', 
            'list_image' => '/images/ambassador_4.png', 
            'image' => '/images/detail_4.png', 
            'content' => "Damilola is an experienced SAP Services Client Partner and certified SAP FICO Consultant. Over the past 13 years, she has held roles in SAP consulting including project management, business consultant, team lead, trainer, relationship manager, services engagement manager, and services client partner.
                <br><br>
                Her experience spans Europe, Asia, and Africa across industries such as Oil & Gas, Pharmaceuticals, Chemical, Semiconductors, Finance, Insurance, and Public Sector. She holds a PRINCE2 Project Management certificate and has strong business consultancy experience.
                <br><br>
                Damilola is involved in professional mentoring programs and is passionate about raising well-behaved children who are positive change agents in society.
                ", 
            'link' => 'https://www.linkedin.com/in/lola-akinwale-2002472/'
        ],

        [
            'name' => 'Akinbamidele Akintola', 
            'list_image' => '/images/ambassador_2.png', 
            'image' => '/images/detail_2.png', 
            'content' => "Dele, a seasoned executive with 15+ years in Equity Capital Markets (ECM) and investment banking across Sub-Saharan Africa, has raised over USD10bn for African-focused corporates. Currently, as Chief Commercial Officer at Alerzo, an innovative Technology Distribution Startup, he tackles FMCG supply chain issues in Nigeria, empowering informal retailers, especially working mothers. 
            Previously, as Senior VP at Stanbic IBTC Stockbrokers Limited, he fortified the firm's position as the top brokerage for over a decade, executing landmark ECM deals. Dele's tenure at Renaissance Capital also saw pivotal growth, where he managed Africa Equity Sales and served as an Equity Research Analyst.<br>
            He's renowned for capital raises like the $200M MTN Nigeria Secondary Sale, $500M Seplat IPO, and $5B MTN Nigeria Listing by Introduction. Academically, he holds a bachelor’s degree from Babcock University, an MSc from Loughborough University, and recently completed an Executive MBA at MIT.", 
            'link' => 'https://www.linkedin.com/mwlite/in/akinbamidele-akintola-90aa2546'
        ],
        
        [
            'name' => 'Funlola Adegoke', 
            'list_image' => '/images/ambassador_5.png', 
            'image' => '/images/detail_5.png', 
            'content' => "Funlola is the Founder and Creative Director behind the Nordic Lagosian Designs brand - providing modern interior design, styling and staging services for commercial and residential properties across Nigeria. 
                <br><br>
                She is the Founding Director of The Fariga Initiative Against Bullying in Schools (FIABAS), an advocacy body focused on addressing bullying in schools and influencing socio-cultural norms around harmful behaviours perpetrated against children in schools across Africa.
                <br><br>
                She has a BSc in Human Resource Management from the University of Lagos, an MSc in Human Resource Management from the University of Kingston, and over 20 years of experience in Banking, Business Development, Sales and Strategy.", 
            'link' => 'https://linkedin.com/in/ambassador1'
        ],

        [
            'name' => 'Ifeoma Okpala', 
            'list_image' => '/images/ambassador_6.png', 
            'image' => '/images/detail_6.png', 
            'content' => "Ifeoma is an executive coach and shipping and logistics professional in Denmark since 2019. With over 13 years of experience, she has held various management roles in Africa and Europe. Currently, she works for Maersk and serves as VP and Director of Career & Personal Development for Professional Women of Colour Denmark (ProWoc), a non-profit offering networking events and career programs for women of colour in Denmark.<br>
                Ifeoma holds a bachelor’s in mass communication from the University of Lagos, Prince2 certification in Project Management from the UK, and Executive Leadership Education from the University of Stellenbosch. She earned her Executive Coaching Certification from Henley Business School Denmark.<br>
                An avid traveller, Ifeoma loves connecting people and ideas for impactful encounters. She supports professionals through mentoring, coaching, and equipping them with career development tools.", 
            'link' => 'https://www.linkedin.com/in/ifeoma-okpala/'
        ],

        [
            'name' => 'Chukwuma Nwanze', 
            'list_image' => '/images/ambassador_3.png', 
            'image' => '/images/detail_3.png', 
            'content' => "Chukwuma Nwanze is the Managing Director/Chief Executive Officer at Credit Direct Ltd, Nigeria's premier consumer lending finance company. Prior to joining Credit Direct, Chukwuma had worked in different sectors of the economy including Banking, Management Consulting, Oil and Gas, ICT and the Public Sector as a Chief Finance Officer in many prestigious companies.<br>
                He is a Fellow of the Institute of Chartered Accountants of Nigeria (ICAN) with over 22 years of working experience. He holds an MBA from the prestigious Warwick Business School, University of Warwick, Coventry, United Kingdom. He is an alumnus of Oxford Business School, UK, Nanyang Business School, Singapore and the Stellenbosch Business School, Cape Town, South Africa and the Lagos Business School, Lagos, Nigeria.<br>
                Chukwuma is a doctoral candidate at Edinburgh Business School and is a big advocate of equal learning opportunities for every child.", 
            'link' => 'https://www.linkedin.com/in/chukwuma-nwanze-9b002a18/'
        ],

        [
            'name' => 'Ijeoma Anyigbo', 
            'list_image' => '/images/ambassador_7.png', 
            'image' => '/images/detail_7.png', 
            'content' => "Ijeoma is the Nigeria County Manager for Oxygen Hub. She has 9 years’ experience in Healthcare Advisory and Healthcare Financing and has worked for organizations such as PwC and IFHA. Ijeoma has a Master’s in Public Health from University of Oklahoma Health Sciences Center.
                <br><br>
                Ijeoma is also a Director at Quelu Education Advising Center and has partnered with Education USA (Nigeria) on college focused initiatives.
            ", 
            'link' => 'https://www.linkedin.com/in/ijeoma-anyigbo-3118a84a/'
        ],

        [
            'name' => 'Nnenna Irebisi', 
            'list_image' => '/images/ambassador_8.png', 
            'image' => '/images/detail_8.png', 
            'content' => "Nnenna is an experienced policy, growth and technology leader with several years of scaling high-impact businesses across Africa. She currently leads Strategic Government Engagements across West Africa at AWS, driving technology advancement across government organizations for citizen good.<br>
                Previously, Nnenna led growth and expansion as Regional Business Lead, West and Central Africa at Refinitiv. She was responsible for strategy, retention and growing existing and new business, expanding into new countries. Prior to Thomson Reuters, Nnenna had experience in consulting and energy, working across Sahara Group, Optima Group and as a consultant.<br>
                Nnenna sits on the board of BlueSpace Africa, a Pan African FinTech, and lends her experience to start-ups looking to penetrate African markets.", 
            'link' => 'https://www.linkedin.com/in/nnennairebisi/'
        ],

        [
            'name' => 'Oluwole Coker', 
            'list_image' => '/images/ambassador_9.png', 
            'image' => '/images/detail_9.png', 
            'content' => 'Oluwole Coker', 
            'link' => 'https://www.linkedin.com/in/oluwole-coker-49499a121/'
        ],
    ];
    return view('who-we-are', compact('teams'))->with('boards', $boards)->with('downloads', $downloads);
});

Route::post('/newsletters', [NewsletterController::class, 'create']);




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::post('/beneficiaries', [BeneficiaryApplicationController::class, 'store']);
Route::post('/partners', [PartnerApplicationController::class, 'store']);
Route::post('/donation-lead', [DonationController::class, 'store']);
Route::post('/volunteer', [VolunteerController::class, 'store']);


Auth::routes();

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Add other routes that require authentication here

    Route::get('/download/{model}/csv', [CSVController::class, 'download'])->where('model', '[A-Za-z]+');

    Route::get('dashboard', [DashboardController::class, 'show']);

    Route::get('/newsletters', [NewsletterController::class, 'index']);
    Route::delete('/newsletters/{newsletter}', [NewsletterController::class, 'delete']);

    // Downloads routes
    Route::get('/downloads', [DownloadController::class, 'index']);
    Route::get('/downloads/create', [DownloadController::class, 'create']);
    Route::post('/downloads', [DownloadController::class, 'store']);
    Route::delete('/downloads/{download}', [DownloadController::class, 'destroy']);

    // Beneficiary Applications routes
    Route::get('/beneficiaries', [BeneficiaryApplicationController::class, 'index']);
    Route::get('/beneficiaries/{id}', [BeneficiaryApplicationController::class, 'show']);
    Route::get('/beneficiaries/create', [BeneficiaryApplicationController::class, 'create']);
    Route::delete('/beneficiaries/{id}', [BeneficiaryApplicationController::class, 'destroy']);

    // Partner Applications routes
    Route::get('/partners', [PartnerApplicationController::class, 'index']);
    Route::get('/partners/{id}', [PartnerApplicationController::class, 'show']);
    Route::get('/partners/create', [PartnerApplicationController::class, 'create']);
    Route::delete('/partners/{id}', [PartnerApplicationController::class, 'destroy']);

    // Donation Lead routes
    Route::get('/donation-leads', [DonationController::class, 'index']);
    Route::get('/donation-leads/{id}', [DonationController::class, 'show']);
    Route::delete('/donation-leads/{donation}', [DonationController::class, 'destroy']);

     // Volunteer Applications routes
     Route::get('/volunteers', [VolunteerController::class, 'index']);
     Route::get('/volunteers/{id}', [VolunteerController::class, 'show']);
     Route::get('/volunteers/create', [VolunteerController::class, 'create']);
     Route::delete('/volunteers/{id}', [VolunteerController::class, 'destroy']);

     // Blog routes
     Route::get('/blogs', [PostController::class, 'index']);
     Route::get('/blogs/create', [PostController::class, 'create']);
     Route::get('/blogs/{id}', [PostController::class, 'show']);
     Route::post('/blogs/{id}', [PostController::class, 'store']);
     Route::delete('/blogs/{id}', [PostController::class, 'destroy']);

     // User routes
     Route::get('/users', [UserController::class, 'index']);
     Route::get('/users/create', [UserController::class, 'create']);
     Route::get('/users/{id}/edit', [UserController::class, 'edit']);
     Route::get('/users/{id}', [UserController::class, 'show']);
     Route::put('/users/{id}', [UserController::class, 'update']);
     Route::post('/users', [UserController::class, 'store']);
     Route::delete('/users/{id}', [UserController::class, 'destroy']);
     
     Route::get('/users/edit/me', [UserController::class, 'me']);

     // Gallery routes
    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::get('/galleries/create', [GalleryController::class, 'create']);
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit']);
    Route::post('/galleries', [GalleryController::class, 'store']);
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update']);
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy']);

});


Route::get('/social-media-posts', function () {
    return view('social-media-posts');
});

Route::get('/forms', function () {
    return view('forms');
});

Route::get('/inspire-program', function () {
    return view('programme.inspire');
});
Route::get('/special-scholarship-program', function () {
    return view('programme.special');
});
Route::get('/mentorship-program', function () {
    return view('programme.mentorship');
});
Route::get('/summer-school-program', function () {
    return view('programme.summer');
});
Route::get('/life-long-program', function () {
    return view('programme.lifelong');
});
Route::get('/school-build', function () {
    return view('programme.school-builds');
});

Route::get('/blogs', function () {
    $posts = App\Models\Post::published()->latest('published_at')->paginate(); // Order by published_at descending
    $featured_posts = App\Models\Post::where('is_featured', 1)
                                ->get();

    return view('blogs', [
        'posts' => $posts,
        'featured_posts' => $featured_posts->shuffle()->take(4)
    ]
    );
});

Route::get('/blog/{id}', function ($id) {
    $post = App\Models\Post::with(['user'])->find($id);
    $similarPosts = [];
    if (!empty($post)) {
        $words = explode(' ', $post->title);
        $similarPosts = App\Models\Post::where(function ($query) use ($words) {
            foreach ($words as $word) {
                $query->orWhere('title', 'LIKE', "%{$word}%");
            }
        })->take(3)->get()
        ->filter(function ($post, $key) use($id) {
            return $post->id != $id;
        });
    }

    // increase view
    View::create(['post_id' => $post->id]);

    return view('blog-view', [
        'post' => $post,
        'similar_posts' => $similarPosts
    ]);
});

Route::get('/get-involved', function () {
    // $ambassadors = [
    //     [
    //         'name' => 'Abimbola Ayinde', 
    //         'list_image' => '/images/ambassador_1.png', 
    //         'image' => '/images/detail_1.png', 
    //         'content' => "Abimbola is the GM Upstream Commercial and Corporate Finance at FIRST Exploration & Petroleum Development Company Limited (FIRST E&P). Previously, she worked as a Vice President in Investment Banking at FCMB Capital Markets Limited and as a General Manager at A3 & O Limited. 
    //             <br><br>
    //             Abimbola holds an MBA from Manchester Business School in the UK and a bachelor's degree from the University of Ibadan in Nigeria. She has extensive experience in investment banking, strategic business planning, and management consulting. 
    //             <br><br>
    //             Abimbola is dedicated to supporting the education and wellbeing of children with absent or underprivileged parents, volunteering and advocating for multiple NGOs.", 
    //         'link' => 'https://www.linkedin.com/in/abimbola-ayinde-0ab79018/'
    //     ],

    //     [
    //         'name' => 'Akinbamidele Akintola', 
    //         'list_image' => '/images/ambassador_2.png', 
    //         'image' => '/images/detail_2.png', 
    //         'content' => "Dele, a seasoned executive with 15+ years in Equity Capital Markets (ECM) and investment banking across Sub-Saharan Africa, has raised over USD10bn for African-focused corporates. Currently, as Chief Commercial Officer at Alerzo, an innovative Technology Distribution Startup, he tackles FMCG supply chain issues in Nigeria, empowering informal retailers, especially working mothers. 
    //             Previously, as Senior VP at Stanbic IBTC Stockbrokers Limited, he fortified the firm's position as the top brokerage for over a decade, executing landmark ECM deals. Dele's tenure at Renaissance Capital also saw pivotal growth, where he managed Africa Equity Sales and served as an Equity Research Analyst.<br>
    //             He's renowned for capital raises like the $200M MTN Nigeria Secondary Sale, $500M Seplat IPO, and $5B MTN Nigeria Listing by Introduction. Academically, he holds a bachelor’s degree from Babcock University, an MSc from Loughborough University, and recently completed an Executive MBA at MIT.", 
    //         'link' => 'https://www.linkedin.com/mwlite/in/akinbamidele-akintola-90aa2546'
    //     ],

    //     [
    //         'name' => 'Chukwuma Nwanze', 
    //         'list_image' => '/images/ambassador_3.png', 
    //         'image' => '/images/detail_3.png', 
    //         'content' => "Chukwuma Nwanze is the Managing Director/Chief Executive Officer at Credit Direct Ltd, Nigeria's premier consumer lending finance company. Prior to joining Credit Direct, Chukwuma had worked in different sectors of the economy including Banking, Management Consulting, Oil and Gas, ICT and the Public Sector as a Chief Finance Officer in many prestigious companies.<br>
    //             He is a Fellow of the Institute of Chartered Accountants of Nigeria (ICAN) with over 22 years of working experience. He holds an MBA from the prestigious Warwick Business School, University of Warwick, Coventry, United Kingdom. He is an alumnus of Oxford Business School, UK, Nanyang Business School, Singapore and the Stellenbosch Business School, Cape Town, South Africa and the Lagos Business School, Lagos, Nigeria.<br>
    //             Chukwuma is a doctoral candidate at Edinburgh Business School and is a big advocate of equal learning opportunities for every child.", 
    //         'link' => 'https://www.linkedin.com/in/chukwuma-nwanze-9b002a18/'
    //     ],

    //     [
    //         'name' => 'Damilola Akinwale', 
    //         'list_image' => '/images/ambassador_4.png', 
    //         'image' => '/images/detail_4.png', 
    //         'content' => "Damilola is an experienced SAP Services Client Partner and certified SAP FICO Consultant. Over the past 13 years, she has held roles in SAP consulting including project management, business consultant, team lead, trainer, relationship manager, services engagement manager, and services client partner.
    //             <br><br>
    //             Her experience spans Europe, Asia, and Africa across industries such as Oil & Gas, Pharmaceuticals, Chemical, Semiconductors, Finance, Insurance, and Public Sector. She holds a PRINCE2 Project Management certificate and has strong business consultancy experience.
    //             <br><br>
    //             Damilola is involved in professional mentoring programs and is passionate about raising well-behaved children who are positive change agents in society.
    //             ", 
    //         'link' => 'https://www.linkedin.com/in/lola-akinwale-2002472/'
    //     ],

    //     [
    //         'name' => 'Funlola Adegoke', 
    //         'list_image' => '/images/ambassador_5.png', 
    //         'image' => '/images/detail_5.png', 
    //         'content' => "Funlola is the Founder and Creative Director behind the Nordic Lagosian Designs brand - providing modern interior design, styling and staging services for commercial and residential properties across Nigeria. 
    //             <br><br>
    //             She is the Founding Director of The Fariga Initiative Against Bullying in Schools (FIABAS), an advocacy body focused on addressing bullying in schools and influencing socio-cultural norms around harmful behaviours perpetrated against children in schools across Africa.
    //             <br><br>
    //             She has a BSc in Human Resource Management from the University of Lagos, an MSc in Human Resource Management from the University of Kingston, and over 20 years of experience in Banking, Business Development, Sales and Strategy.", 
    //         'link' => 'https://linkedin.com/in/ambassador1'
    //     ],

    //     [
    //         'name' => 'Ifeoma Okpala', 
    //         'list_image' => '/images/ambassador_6.png', 
    //         'image' => '/images/detail_6.png', 
    //         'content' => "Ifeoma is an executive coach and shipping and logistics professional in Denmark since 2019. With over 13 years of experience, she has held various management roles in Africa and Europe. Currently, she works for Maersk and serves as VP and Director of Career & Personal Development for Professional Women of Colour Denmark (ProWoc), a non-profit offering networking events and career programs for women of colour in Denmark.<br>
    //             Ifeoma holds a bachelor’s in mass communication from the University of Lagos, Prince2 certification in Project Management from the UK, and Executive Leadership Education from the University of Stellenbosch. She earned her Executive Coaching Certification from Henley Business School Denmark.<br>
    //             An avid traveller, Ifeoma loves connecting people and ideas for impactful encounters. She supports professionals through mentoring, coaching, and equipping them with career development tools.", 
    //         'link' => 'https://www.linkedin.com/in/ifeoma-okpala/'
    //     ],

    //     [
    //         'name' => 'Ijeoma Anyigbo', 
    //         'list_image' => '/images/ambassador_7.png', 
    //         'image' => '/images/detail_7.png', 
    //         'content' => "Ijeoma is the Nigeria County Manager for Oxygen Hub. She has 9 years’ experience in Healthcare Advisory and Healthcare Financing and has worked for organizations such as PwC and IFHA. Ijeoma has a Master’s in Public Health from University of Oklahoma Health Sciences Center.
    //             <br><br>
    //             Ijeoma is also a Director at Quelu Education Advising Center and has partnered with Education USA (Nigeria) on college focused initiatives.
    //         ", 
    //         'link' => 'https://www.linkedin.com/in/ijeoma-anyigbo-3118a84a/'
    //     ],

    //     [
    //         'name' => 'Nnenna Irebisi', 
    //         'list_image' => '/images/ambassador_8.png', 
    //         'image' => '/images/detail_8.png', 
    //         'content' => "Nnenna is an experienced policy, growth and technology leader with several years of scaling high-impact businesses across Africa. She currently leads Strategic Government Engagements across West Africa at AWS, driving technology advancement across government organizations for citizen good.<br>
    //             Previously, Nnenna led growth and expansion as Regional Business Lead, West and Central Africa at Refinitiv. She was responsible for strategy, retention and growing existing and new business, expanding into new countries. Prior to Thomson Reuters, Nnenna had experience in consulting and energy, working across Sahara Group, Optima Group and as a consultant.<br>
    //             Nnenna sits on the board of BlueSpace Africa, a Pan African FinTech, and lends her experience to start-ups looking to penetrate African markets.", 
    //         'link' => 'https://www.linkedin.com/in/nnennairebisi/'
    //     ],

    //     [
    //         'name' => 'Oluwole Coker', 
    //         'list_image' => '/images/ambassador_9.png', 
    //         'image' => '/images/detail_9.png', 
    //         'content' => 'Content for Ambassador 1', 
    //         'link' => 'https://www.linkedin.com/in/oluwole-coker-49499a121/'
    //     ],

    //     [
    //         'name' => 'Seyi Akinwale', 
    //         'list_image' => '/images/ambassador_10.png', 
    //         'image' => '/images/detail_10.png', 
    //         'content' => "Seyi Akinwale has extensive experience originating, developing, and executing infrastructure-related projects in Sub Saharan Africa. He has corporate experience leading the finance teams in Sub-Saharan Africa currently at GE Capital and previously at PricewaterhouseCoopers (PwC) and is passionate about the Infrastructural development of developing economies. 
    //             <br><br>
    //             His understanding of the key role education plays in the development of nations has led to the decision to set up the Foundation to provide a platform to improve the quality of leadership in Africa by increasing access to education for less privileged children.
    //         ", 
    //         'link' => 'https://www.linkedin.com/in/seyi-akinwale/'
    //     ],
    //     // Add more ambassadors as needed
    // ];

    return view('get-involved')
                ->with("genderMapping", Volunteer::getGenderMapping())
                ->with("sourceMapping", Volunteer::getSourceMapping())
                ->with("availabilityMapping", Volunteer::getAvailabilityMapping())
                ->with("interestMapping", Volunteer::getInterestMapping());
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->paginate();
    return view('gallery', compact('galleries'));
});

Route::post('/donate', [DonationController::class, 'store']);
