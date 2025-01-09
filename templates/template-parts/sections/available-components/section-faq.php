<?php 
global $section;
$faqs = $section['faq_cards'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="faq-container" class="w-full<?php echo $bg_color; ?>">
    <div id="faq-inner" class="container-inner">
        <div id="section-header"<?php echo $subtext ?>>
            <h2 class="section-title"><?php echo $section['heading']; ?></h2>
            <?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
        </div>
        <?php foreach ( $faqs as $faq ) { ?>    
            <div class="question-answer">
                <div class="header">
                    <div class="question"><?php echo $faq['faq_question'] ?></div>
                    <span class="icon"></span>
                </div>
                <div class="result">
                    <div class="answer"><?php echo $faq['faq_answer'] ?></div>
                </div>
            </div>
        <?php }; ?>
    </div>
</section>

<script>
const headers = document.getElementsByClassName("header");
const contents = document.getElementsByClassName("answer");
const expanded = document.getElementsByClassName("question-answer");
const icons = document.getElementsByClassName("icon");

for (let i = 0; i < headers.length; i++) {
    headers[i].addEventListener("click", () => {
        for (let j = 0; j < contents.length; j++) {
            if (i == j) {
                contents[j].classList.toggle("answer-transition");
                expanded[j].toggleAttribute("aria-expanded");
            } else {
                contents[j].classList.remove("answer-transition");
                expanded[j].removeAttribute("aria-expanded");
            }
        }

    });
}
</script>
<script>
schemaHeader = `
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
`;

schemaBody = [];

schemaFooter = `
    ]
}
`;

let catchQuestion = document.getElementsByClassName('question');
let question = [].map.call(catchQuestion, elem => elem.textContent);

let catchAnswer = document.getElementsByClassName('answer');
let answer = [].map.call(catchAnswer, elem => elem.textContent);

for (let i = 0; i<question.length; i++) {
    schemaBody.push(
        `{
    "@type": "Question",
    "name": "${question[i]}",
    "acceptedAnswer": {
        "@type": "Answer",
        "text": "${answer[i]}"
    }
    }`)
}

let structuredDataText = schemaHeader + schemaBody + schemaFooter;
let schema = document.createElement('script');
schema.setAttribute('type', 'application/ld+json');
schema.textContent = structuredDataText;
document.head.appendChild(schema);
</script>

