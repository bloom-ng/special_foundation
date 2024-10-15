import { useEffect, useRef, useState } from "react";
import Markdown from "markdown-to-jsx";

function App() {
	const [openChatbot, setOpenChatbot] = useState(false);
	const [typing, setTyping] = useState(false);
	const [messages, setMessages] = useState([
		{
			message: "Hello, I am Temi your AI assistant.",
			sender: "assistant",
			direction: "incoming",
		},
		{
			message: "How can I help you today?",
			sender: "assistant",
			direction: "incoming",
		},
	]);
	const [message, setMessage] = useState("");
	const messageEndRef = useRef(null);

	const handleSend = async (message) => {
		setTyping(true);

		try {
			setMessage("");
			const newMessage = {
				message: message,
				sender: "user",
				direction: "outgoing",
			};
			const newMessages = [...messages, newMessage];
			setMessages(newMessages);
		} catch (error) {
			console.error("Error:", error);
		}
	};
	const knowledgeBase = `
The Special Foundation is a social impact organisation that focuses on raising young African
leaders through education by providing platforms and opportunities to fulfil their dreams. We
are a community of young professionals with a vision to improve the quality of leadership in
all spheres of governance in Africa by creating access for more children to get an education.
Founded by Seyi Akinwale in 2018 through his vision to improve the quality of leadership in
all spheres of governance in Africa and ensure the creation of a platform where more young
people can maximize their potential by gaining access to education. The foundation has
empowered over 21,000 less privileged, gifted African Children through education,
mentorship, and leadership opportunities.

Our Mission
To improve the quality of leadership in Africa by providing a platform where less privileged
and highly talented children can be equipped with an education, mentoring and leadership
training to bring about a positive influence to their world.

Our Vision
“Making dreams come true”
We dream of an Africa where more young people have access to an education and the
essential tools that provide them with a foundation to be positive change agents to their
respective communities, the African continent and the World.

How We Work
Our strategy is anchored on three pillars which are Quality, Life Long Development and
Access. Currently, we are scaling our impact across Nigeria and Africa by targeting to raise
100,000 leaders by 2030. Our strategy directly resonates with Sustainable Development
Goal 4 on Education though our work spans across a wide spectrum of the SDGs global
development framework.

Improving Quality Education
The Special Foundation leverages partnerships to improve the quality of education for all
students in Nigeria. Through our partnership with schools, we extend our reach to
disadvantaged communities and lower the costs of quality education to the most vulnerable.

Lifelong Development
Our lifelong development programme provides educational and psycho-social support to
facilitate the continuous personal and professional development of our beneficiaries. The
programme includes leadership training and mentorship through internships, community
involvement and lifelong engagement through our volunteer network equipping young people
with the leadership and life skills needed to become champions in their families,
communities, and schools.

Access to Education
We provide access to education through two targeted scholarship programmes, the Inspire
Scholarship & the Special Scholarship. The Inspire scholarship is targeted at children in
primary and secondary schools while The Special scholarship is targeted at talented & gifted
students in local tertiary institutions.

Our Work
The Inspire Scholarship
The Inspire Scholarship Program is designed to provide scholarships for children of low
income earners, orphaned children, and families that have lost a breadwinner. This initiative
focuses on primary and secondary school students. The scholarship funds are paid directly
to the schools to cover the following items for each child per session:
• Tuition • Uniform costs • Books • Stationery • Lunch

Who qualifies for the scholarship?
● The applicants must be orphaned (lost one or both parents) and or a disadvantaged
child with both parents who are unable to fend for the child.
● All applicants must be less than 18years.
● Scholarships are restricted to day and boarding Government, Private or mission
schools in Africa.
● The Scholarship will not sponsor children outside of their country of residence at this
time. The scholarship is valid until the student completes their secondary education.

Special Summer School
This program is designed to offer out-of-school and less privileged children continued and
all-around capacity development. It runs for about 3-5 weeks, during the summer holidays.
The age range of participants is from 8 to 18 years. At the end of the program, the
participants are equipped with various skill sets such as mental mathematics, creative
writing, ICT, public speaking, and craftsmanship.

Mentorship/Career Day Program
Our Mentorship/Career Day program is a program where professionals in different fields talk
to school students about their careers. The Professionals bring the realities of the jobs to the
children together with life skills, secrets on how to make career choices, tips on how to excel,
personal success stories and career opportunities.
School Build Program
At the end of the program, the participants are equipped with various skill sets such as
mental mathematics, creative writing, ICT, public speaking, and craftsmanship. Through
this program, students have a better chance of reaching their best potential.

Our Footprint
Through cooperation agreements with State and Local Governments, Missionary
Societies and Schools. We currently sponsor children across 14 states in Nigeria with
the vision to move to other African Countries. We have an operating office in Lagos
which coordinates all our activities.

Impact Locations:
1. Lagos
2. Niger
3. Abuja
4. Kano
5. Adamawa
6. Ogun
7. Osun
8. Gombe
9. Kogi
10. Plateau
11. Enugu
12. Oyo
13. Kaduna
14. Ondo

Our Numbers
+21,000
Nigerian children directly and indirectly impacted by the foundation over the last 5years
+460
Nigerian children are given access to education through the inspire scholarship program
yearly
+10,672
Nigerian children access educational and vocational training through the free summer school
program yearly
+6,879
Nigerian children accessing mentorship through our mentorship/career day program
+5
Nigerian Schools accessing conducive learning environment through our school build project
Our 2030 Target
+1500000
Africans directly and indirectly impacted by the Foundation
+100000
African students given access to education through scholarships every year
+40000
African students on our mentorship program
+300000
African students sponsored through the Summer School programs
+100
African schools benefiting from the School Build Program

Our Accountability Framework
Our accountability is essential to our continued ability to work and deliver our impact-driven
objectives. We apply the resources at our disposal the experience skills and knowledge of
our team personal and third-party contributions, our networks and leverage value-adding
support for our army of Volunteers and Ambassadors.
We have pledged to tackle the time Educational deficit in Africa through our various
scholarship intervention. mentorship and infrastructure development programs Our
accountability is maintained through:
● A vibrant board of trustees and Advisory council who provide general oversight to the
activities of the Foundation.
● A set of operating principles to which our team board advisory council and
ambassadors are held accountable and is supported by a robust control framework
to ensure these principles are followed.
● Regular reports that assess our performance against pre-defined impact targets and
milestones

Contact Information for further inquiry: Email: info@thespecialfoundation.org, Phone: +2349063444444
`;

	const programs = `
    	{
			title: "The Inspire Scholarship Program",
			description: "The Inspire Scholarship Program is designed to provide scholarships for children of low income earners, orphaned children, and families that have lost a breadwinner. This initiative focuses on primary and secondary school students. The scholarship funds are paid directly to the schools to cover the following items for each child per session: Tuition • Uniform costs • Books • Stationery • Lunch",
			link: "https://www.thespecialfoundation.org/inspire-program/",
		},
		{
			title: "The Special Scholarship Program",
			description: "Special Scholarship is merit based and targeted at identifying gifted students for local tertiary institutions. This scholarship is available to students under the age of 21 and covers tuition (including books and other materials).",
			link: "https://www.thespecialfoundation.org/special-scholarship-program/",
		},
		{
			title: "Mentorship/Career Day Program",
			description: "Our Mentorship/Career Day program is a program where professionals in different fields talk to school students about their careers. The Professionals bring the realities of the jobs to the children together with life skills, secrets on how to make career choices, tips on how to excel, personal success stories and career opportunities. School Build Program",
			link: "https://www.thespecialfoundation.org/mentorship-program/",
		},
		{
			title: "Special Summer School",
			description: "This program is designed to offer out-of-school and less privileged children continued and all-around capacity development. It runs for about 3-5 weeks, during the summer holidays. The age range of participants is from 8 to 18 years. At the end of the program, the participants are equipped with various skill sets such as mental mathematics, creative writing, ICT, public speaking, and craftsmanship.",
			link: "https://www.thespecialfoundation.org/summer-school-program/",
		},
		{
			title: "Lifelong Development",
			description: "Our lifelong development programme provides educational and psycho-social support to facilitate the continuous personal and professional development of our beneficiaries. The programme includes leadership training and mentorship through internships, community involvement and lifelong engagement through our volunteer network equipping young people with the leadership and life skills needed to become champions in their families, communities, and schools.",
			link: "https://www.thespecialfoundation.org/life-long-program/",
		},
		{
			title: "School Build Program",
			description: "At the end of the program, the participants are equipped with various skill sets such as mental mathematics, creative writing, ICT, public speaking, and craftsmanship. Through this program, students have a better chance of reaching their best potential.",
			link: "https://www.thespecialfoundation.org/school-build/",
		},
	`;

	const pages = `
    	{
			title: "Home",
			description: "Homepage",
			link: "thespecialfoundation.org",
		},
		{
			title: "Who we are",
			description: "Who we are",
			link: "https://www.thespecialfoundation.org/who-we-are/",
		},
		{
			title: "Get involved",
			description: "Get involved into the foundation you can signup to be a volunteer or become a sponsor on this page",
			link: "https://www.thespecialfoundation.org/get-involved/",
		},
		{
			title: "Donate",
			description: "Donate to the foundation to support our work",
			link: "https://www.thespecialfoundation.org/donate/",
		},
		{
			title: "Blogs",
			description: "Blogs",
			link: "https://www.thespecialfoundation.org/blogs/",
		},
		{
			title: "Social media posts",
			description: "Social media posts",
			link: "https://www.thespecialfoundation.org/social-media-posts/",
		},
		{
			title: "The Inspire Scholarship Program",
			description: "The Inspire Scholarship Program is designed to provide scholarships for children of low income earners, orphaned children, and families that have lost a breadwinner. This initiative focuses on primary and secondary school students. The scholarship funds are paid directly to the schools to cover the following items for each child per session: Tuition • Uniform costs • Books • Stationery • Lunch",
			link: "https://www.thespecialfoundation.org/inspire-program/",
		},
		{
			title: "The Special Scholarship Program",
			description: "Special Scholarship is merit based and targeted at identifying gifted students for local tertiary institutions. This scholarship is available to students under the age of 21 and covers tuition (including books and other materials).",
			link: "https://www.thespecialfoundation.org/special-scholarship-program/",
		},
		{
			title: "Mentorship/Career Day Program",
			description: "Our Mentorship/Career Day program is a program where professionals in different fields talk to school students about their careers. The Professionals bring the realities of the jobs to the children together with life skills, secrets on how to make career choices, tips on how to excel, personal success stories and career opportunities. School Build Program",
			link: "https://www.thespecialfoundation.org/mentorship-program/",
		},
		{
			title: "Special Summer School",
			description: "This program is designed to offer out-of-school and less privileged children continued and all-around capacity development. It runs for about 3-5 weeks, during the summer holidays. The age range of participants is from 8 to 18 years. At the end of the program, the participants are equipped with various skill sets such as mental mathematics, creative writing, ICT, public speaking, and craftsmanship.",
			link: "https://www.thespecialfoundation.org/summer-school-program/",
		},
		{
			title: "Lifelong Development",
			description: "Our lifelong development programme provides educational and psycho-social support to facilitate the continuous personal and professional development of our beneficiaries. The programme includes leadership training and mentorship through internships, community involvement and lifelong engagement through our volunteer network equipping young people with the leadership and life skills needed to become champions in their families, communities, and schools.",
			link: "https://www.thespecialfoundation.org/life-long-program/",
		},
		{
			title: "School Build Program",
			description: "At the end of the program, the participants are equipped with various skill sets such as mental mathematics, creative writing, ICT, public speaking, and craftsmanship. Through this program, students have a better chance of reaching their best potential.",
			link: "https://www.thespecialfoundation.org/school-build/",
		},
	`;

	const systemMessage = `You are Temi an AI assistant for The Special Foundation, 
		you speak with people and provide information about the foundation's programs, offerings and activities. 
		Your responses should be concise, do not expand or give large sentences unless explicitly asked to. 
		You are programmed to identify typos in requests. 
		Your goal is to provide accurate and helpful information to customers while maintaining a friendly and engaging tone. 
		Your response should always be in plain text format only, no markdown, no tripple quotes. 
		For answering questions use information delimited with triple quotes. We call it a Knowledge base.
		Your primary role is to provide accurate and relevant information based on this Knowledge base.
		If the Knowledge base contains the answer, understand the information properly and answer the question asked.
		If the Knowledge base doesn't contain the answer, review the knowledge base once again to be sure we really don't have an answer. then simply write “I'm sorry, but I don't have the information to answer that question. Can I help you with something else?”
		And then for questions concerning the programs, use the following knowledge base: called programs knowledge base. and make each text of a program title a link to the program's website using the link in the programknowledge base each objects and make them clickable while displaying each as a underlined decorated link.
		underline the links.
		If you also get a question also compare the question with the pages knowledge base and give user your initial response while also giving the user the option to click on the link to the page to see more information and if your are ever suggesting a link to a page or a program always make sure the link is in the pages knowledge base or the programs knowledge base and make the text bold, underlined and clickable.
		When you think you don't know an answer look through the pages, knowledge base and programs knowledge base once again to make sure it's not there.

		knowledge base: '''${knowledgeBase}'''
		program knowledge base: '''${programs}''' 
		pages knowledge base: '''${pages}'''
	`;

	const processMessageToLlama = async () => {
		const apiMessages = messages.map((messageObj) => {
			return { role: messageObj.sender, content: messageObj.message };
		});

		console.log("windows.origin :>> ", window.origin);

		const url = `${window.origin}/api/chat`;
		// const url = `https://specialfoundation.bloomdigitmedia.com/api/chat`;
		// const url = "https://api.openai.com/v1/chat/completions";
		const headers = {
			"Content-Type": "application/json",
		};
		const data = {
			model: "gpt-3.5-turbo",
			messages: [
				{ role: "system", content: systemMessage },
				...apiMessages,
			],
		};
		const response = await fetch(url, {
			method: "POST",
			headers: headers,
			body: JSON.stringify(data),
		});
		if (response.status == 200) {
			const respond = await response.json();

			const respondObj = {
				message: respond.choices[0].message.content,
				sender: respond.choices[0].message.role,
				direction: "incoming",
			};

			setMessages((prevMessages) => [...prevMessages, respondObj]);
			setTyping(false);
		} else {
			setTyping(false);
		}
	};

	useEffect(() => {
		if (typing) {
			processMessageToLlama();
		}
		messageEndRef.current?.scrollIntoView({
			behavior: "smooth",
		});
	}, [typing, messages]);

	return (
		<div className=" h-full w-full ">
			<div className="relative h-auto w-screen">
				<img
					src="https://cdn-icons-png.freepik.com/512/8943/8943377.png"
					alt=""
					onClick={() => setOpenChatbot(true)}
					className="w-20 h-20 absolute bottom-0 right-0 m-5 cursor-pointer"
				/>

				{openChatbot && (
					<div
						className="absolute bottom-0 flex flex-col z-50   right-0 m-5  mr-3 bg-[#EDEDED] w-[97vw] h-[95vh] sm:w-[75vw] md:w-[65vw]  lg:w-[36vw] lg:h-[95vh] rounded-xl drop-shadow-md
           md:drop-shadow-xl items-start"
					>
						<div className="p-4  w-full flex items-center gap-4 justify-between bg-[#26225F] rounded-t-xl">
							<div className=" w-full flex items-center gap-4 ">
								<img
									src="https://cdn-icons-png.freepik.com/512/8943/8943377.png"
									alt=""
									onClick={() => setOpenChatbot(true)}
									className="w-12 h-12"
								/>
								<div className="flex flex-col gap-1.5">
									<p className="text-[#25A8D6] font-semibold">
										Assistant
									</p>
									<p className="text-xs text-white ">
										{typing ? "Typing....." : "Online"}
									</p>
								</div>
							</div>

							<img
								src="https://flaticons.net/icon.php?slug_category=mobile-application&slug_icon=close"
								className="w-5 h-5 cursor-pointer"
								alt=""
								onClick={() => setOpenChatbot(false)}
							/>
						</div>
						<div
							className={`w-full h-[80%] overflow-y-scroll p-4 gap-3  flex flex-col items-start `}
						>
							{messages.map((message, index) => (
								<div key={index} className="w-full">
									<div
										className={`${
											message.sender === "assistant"
												? "justify-start"
												: "justify-end"
										} flex w-full`}
									>
										<div
											className={`py-2 pr-5  font-semibold pl-2 max-w-[80%] lg:max-w-[95%] ${
												message.sender !== "assistant"
													? "  rounded-t-2xl rounded-r-2xl  bg-[#25A8D6] text-white"
													: " rounded-t-2xl rounded-l-2xl   bg-[#ffffff] text-[#26225F] "
											}`}
										>
											<Markdown>
												{message.message.replace(
													/"/g,
													""
												)}
											</Markdown>
										</div>
									</div>
								</div>
							))}

							<div ref={messageEndRef} />
						</div>
						<div className="bg-gray-300 flex justify-between items-center rounded-b-xl p-4 w-full">
							<input
								type="text"
								placeholder="Type your new message..."
								className="bg-transparent w-[80%] outline-none px-2 placeholder:text-gray-500 text-gray-600"
								onChange={(e) => setMessage(e.target.value)}
								value={message}
								onKeyDown={(e) => {
									if (e.key === "Enter") {
										handleSend(message);
									}
								}}
							/>
							<img
								src="https://cdn-icons-png.freepik.com/256/5836/5836606.png?semt=ais_hybrid"
								alt=""
								className="w-8 h-8 cursor-pointer bg-transparent"
								onClick={() => handleSend(message)}
							/>
						</div>
					</div>
				)}
			</div>
		</div>
	);
}

export default App;
