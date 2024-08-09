<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sdgs = [
            [
                "image" => "/images/sdg-1.png",
                "title" => "Goal 1 - No Poverty",
                "subtitle" => "The wealth of a nation  is determined by the  quantity and quality of  education.",
                "description" => "With the COVID-19 pandemic, an estimated 124 million people were pushed back into poverty globally, with Africa being the worst hit. Through our  Inspire and Special Scholarships, we are taking significant steps in the fight against poverty by educating and empowering kids in underserved communities. These  scholarships are targeted at orphaned and vulnerable children in disadvantaged communities. We provide tuition (including cost of books and other materials) to children  in primary and secondary schools. We provide the opportunity for these children to learn in a conducive environment with the goal of creating value, contributing to the  economic growth and reducing poverty within the ecosystem.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/inspire-program'>click here</a>."
            ],

            [
                "image" => "/images/sdg-2.png",
                "title" => "Goal 2 - Zero Hunger",
                "subtitle" => "With quality education, we  can end hunger, achieve  food security and improved  nutrition and promote  sustainable agriculture.",
                "description" => "Through our programs, our children benefit from quality education which empowers them with the knowledge and skills they will need in the  future to earn a better living and provide for themselves and their families. In addition, our scholarships help to reduce the financial burden on families of our scholars,  which allows them to achieve food security and improved nutrition for their families.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/special-scholarship-program'>click here</a>."
            ],

            [
                "image" => "/images/sdg-4.png",
                "title" => "Goal 4 - Quality Education",
                "subtitle" => "Ensuring inclusive  and equitable quality  education.",
                "description" => "Through our  <a class='text-blue-400 underline' href='/#programs'>six (6) active programs</a> we are focused on providing African youths with access to quality education. Our programs are  designed to equip children with various skills sets such as mental mathematics, creative writing, ICT, public speaking and craftsmanship. Our programs span over the  three tiers of education: primary, secondary and tertiary school students and so far, we have been able to impact over 5000 students across Nigeria. Our short term goal  is to provide quality education to over 100,000 students across Africa."
            ],

            [
                "image" => "/images/sdg-5.png",
                "title" => "Goal 5 - Gender Equality",
                "subtitle" => "Ensuring the girl  child has access to  quality education.",
                "description" => "Since our inception, we have worked to promote and advance gender equality. We believe equal empowerment (education and skill  development) would position girls and women to break socio-economic and financial barriers that hinder their participation in society and would help them to maximize  their potential. Our programs are designed to provide equal opportunities to children of all genders, however, we ensure that we are taking conscious steps to  empowering young girls with equal access to our resources, scholarships, mentorships. 
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/special-scholarship-program'>click here</a>."
            ],

            [
                "image" => "/images/sdg-8.png",
                "title" => "Goal 8 - Decent Work and Economic Growth",
                "subtitle" => "Creating change makers  who become value  members of their  immediate communities.",
                "description" => "Our programs ensure that children who are from disadvantaged communities have better access to quality  education which will position them with better opportunities in productive employment and innovative businesses. This is essential for a more inclusive and  sustainable economic growth. We are dedicated to helping the youth, and the continent achieve a brighter future.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/summer-school-program'>click here</a>."
            ],
            
            [
                "image" => "/images/sdg-9.png",
                "title" => "Goal 9 - Industry, Innovation and Infrastructure",
                "subtitle" => "Creating a safe  environment were kids  can learn and be  innovative.",
                "description" => "A lot of public schools in Africa lack basic infrastructure. Our School Build Program is focused on building  resilient educational infrastructure to make sure that more children have access to safe learning environments. Through this inclusive and sustainable  learning environment, we believe that more children will have a better chance of reaching their best potentials. In addition, we cultivate an environment  where our children can build their talents and expand their minds into becoming the captains of industries and foster tomorrow’s innovation.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/school-build'>click here</a>."
            ],
            
            [
                "image" => "/images/sdg-11.png",
                "title" => "Goal 11 - Sustainable Cities and Communities",
                "subtitle" => "Ensuring children have  access to safe and  quality learning  environments.",
                "description" => "Every child deserves to learn in a decent environment. Studies show that students learn better in more  conducive environments and this plays a role in their academic performance. Our school build promotes a safer, adaptable and conducive environment for  our scholars to thrive.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/school-build'>click here</a>."
            ],
            
            [
                "image" => "/images/sdg-13.png",
                "title" => "Goal 13 - Climate Action",
                "subtitle" => "Reducing the negative  impact by creating  structures that enhance the  environment.",
                "description" => "To combat the growing effect of industrialization on our environment and the impact on climate change, we have erected solar  panels in some of our school build projects in select communities. In addition, part of our curriculum is focused on educating our young scholars about the  effect of climate change and the actions we can all take to help its impact.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/school-build'>click here</a>."
            ],
            
            [
                "image" => "/images/sdg-16.png",
                "title" => "Goal 16 - Peace, Justice and Strong Institutions",
                "subtitle" => "Ensuring children have  a rounded knowledge  of good values  profitable for the  society.",
                "description" => "Corruption is detrimental to the economic, political and social development in Africa. Our mission is to  improve the quality of leadership in Africa by providing a platform where children can be equipped with quality education, positive mentoring and exceptional  leadership training. These essential tools will set the foundation for our children to be positive influences to their respective communities, the African  continent and the world. They are being empowered to promote a just, peaceful and a more inclusive world.
                <br><br>
                To learn more, <a class='text-blue-400 underline' href='/school-build'>click here</a>.
                <br><br>
                <p class='italic'> “Youths by themselves are the solution to Nigeria’s problems and what The Special Foundation is doing by helping young people through skill acquisition, employment  generation, wealth creation, is contributing for youths to become part of the solution to a youth and national problem.” - <span class='font-bold not-italic'> His Excellency, The Former President of Nigeria, Chief  Olusegun Obasanjo </span></p>"
            ],
        ];
        $featured_posts = Post::where('is_featured', 1)
                                ->get();
        return view('homepage', [
            'featured_posts' => $featured_posts->shuffle()->take(3),
            'sdgs' => $sdgs
        ]);
    }
}
