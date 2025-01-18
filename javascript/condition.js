const diseases = {
    A: [
        { name: "Anxiety Disorder", desc: "A mental health condition characterized by excessive worry and fear." },
        { name: "Adjustment Disorder", desc: "A stress-related condition caused by significant life changes." },
        { name: "Amnesia", desc: "A memory disorder leading to loss of recall ability." }
    ],
    B: [
        { name: "Bipolar Disorder", desc: "A mental illness causing extreme mood swings." },
        { name: "Body Dysmorphic Disorder", desc: "An obsession with perceived flaws in physical appearance." },
        { name: "Bulimia Nervosa", desc: "An eating disorder involving binge eating followed by purging." }
    ],
    C: [
        { name: "Cyclothymic Disorder", desc: "A mood disorder causing emotional highs and lows." },
        { name: "Conduct Disorder", desc: "A behavioral issue involving rule-breaking and aggression." },
        { name: "Cotard’s Delusion", desc: "A rare condition where a person believes they are dead or nonexistent." }
    ],
    D: [
        { name: "Dissociative Identity Disorder", desc: "A condition where multiple identities exist within one person." },
        { name: "Depression", desc: "A mood disorder marked by persistent sadness and lack of interest." },
        { name: "Delirium", desc: "A severe confusion and reduced awareness of the environment." }
    ],
    E: [
        { name: "Eating Disorders", desc: "Disorders like anorexia and bulimia affecting eating behavior." },
        { name: "Excoriation Disorder", desc: "Compulsive picking at one's skin." },
        { name: "Encopresis", desc: "Involuntary defecation, often linked to psychological stress." }
    ],
    F: [
        { name: "Factitious Disorder", desc: "Falsifying illness for attention or sympathy." },
        { name: "Fetal Alcohol Syndrome", desc: "Developmental issues from prenatal alcohol exposure." },
        { name: "Fugue State", desc: "Amnesia with unplanned travel or wandering." }
    ],
    G: [
        { name: "Generalized Anxiety Disorder", desc: "Excessive worry about everyday matters." },
        { name: "Gender Dysphoria", desc: "Distress due to a mismatch between gender identity and biological sex." },
        { name: "Gambling Disorder", desc: "Uncontrollable urge to gamble despite harmful consequences." }
    ],
    H: [
        { name: "Hoarding Disorder", desc: "Persistent difficulty discarding possessions." },
        { name: "Hypochondria", desc: "Obsession with the idea of having a serious medical condition." },
        { name: "Histrionic Personality Disorder", desc: "A need for constant attention and emotional overreaction." }
    ],
    I: [
        { name: "Insomnia Disorder", desc: "Difficulty falling or staying asleep." },
        { name: "Intermittent Explosive Disorder", desc: "Recurrent episodes of extreme anger or aggression." },
        { name: "Illness Anxiety Disorder", desc: "Excessive worry about developing or having a serious illness." }
        ],
   J: [
        { name: "Juvenile Bipolar Disorder", desc: "Early-onset bipolar disorder in children or adolescents." },
        { name: "Job Burnout Syndrome", desc: " Emotional exhaustion and reduced performance due to chronic workplace stress." },
        
    ],
    K:[
        { name: "Kleptomania", desc: "A recurrent urge to steal items not needed for personal use." },
        { name: "Korsakoff Syndrome", desc: " Memory impairment caused by chronic alcohol abuse and vitamin B1 deficiency." },
    ],
    L:[
        { name: "Lethargy Syndrome", desc: "Extreme fatigue and lack of motivation affecting daily activities." },
        { name: "Limbic Encephalitis", desc: "Inflammation in the brain's limbic system, leading to cognitive and emotional disturbances." },
    ],
    M:[
        { name: "Major Depressive Disorder", desc: "Persistent feelings of sadness and loss of interest in activities." },
        { name: "Mood Dysregulation Disorder", desc: " Frequent temper outbursts and persistent irritability in children or adolescents." },


    ],
    N:[
        { name: "Narcolepsy", desc: " Chronic sleep disorder characterized by overwhelming daytime drowsiness." },
        { name: "Neurocognitive Disorder", desc: "A decline in cognitive function due to brain injury, aging, or disease.O"},

    ],
    O:[

        { name: "Obsessive-Compulsive Disorder", desc: "Recurring, intrusive thoughts and repetitive behaviors to alleviate anxiety." },
        { name: "Oppositional Defiant Disorder ", desc: " A pattern of angry, defiant, or vindictive behavior in children.P" },
    ],
    P:[
        { name: "Panic Disorder", desc: "Sudden and intense episodes of fear and physical symptoms like a racing heart. " },
        { name: "Post-Traumatic Stress Disorder", desc: "Persistent distress following a traumatic event. "},

    ],
    Q:[
        { name: "Quotidian Stress Disorder", desc: " Excessive stress from daily routines and small inconveniences. " },
        { name: "Quiet Borderline Personality Disorde", desc: " A subtype of BPD with internalized emotional struggles and self-blame. "},



    ],
    R:[

        { name: "Reactive Attachment Disorder ", desc: " Difficulty forming healthy emotional attachments due to early neglect." },
        { name: "Rumination Disorde", desc: " Repeated regurgitation of food, often linked to stress or psychological conditions. "},


    ],
    S:[
        { name: "Schizophrenia", desc: " A severe mental illness causing distorted thinking, hallucinations, and delusions. " },
        { name: "Social Anxiety Disorder", desc: " Extreme fear of social interactions and being judged by others.T "},



    ],
    T:[
        
        { name: "Tourette Syndrome", desc: " A neurological disorder characterized by involuntary tics and vocalizations." },
        { name: "Trichotillomania", desc: "The compulsive urge to pull out ones hair. "},




    ],
    U:[
        { name: "Unipolar Depression", desc: "  A form of depression without the manic episodes seen in bipolar disorder." },
        { name: "Urbach-Wiethe Disease", desc: "A rare condition affecting emotional regulation and memory. "},



    ],
    V:[

        { name: "Victim Syndrome", desc: " A psychological state of feeling helpless and blaming oneself for problems." },
        { name: "Vascular Dementia", desc: "Cognitive decline caused by reduced blood flow to the brain. "},


    ],
    W:[ 
        { name: "Wernicke’s Encephalopathy", desc: ": Neurological disorder caused by thiamine deficienc. " },
        { name: "Withdrawal Syndrome", desc: "Symptoms occurring after stopping substance use or medication. "},
    ],
    X:[
         { name: "Xeroderma-Related Depression", desc: ": Emotional distress linked to the chronic skin condition xeroderma.. " },
         { name: "X-Linked Intellectual Disability", desc: "Genetic disorders causing intellectual impairment in males." },
    ],
    Y:[
        { name: "Youth-Onset Schizophrenia", desc: "Early-onset schizophrenia in teenagers, impacting their developmental years. " },
        { name: "Yoga Addiction Syndrome", desc: "Over-reliance on yoga practices, potentially masking deeper psychological issues." },
   ],

    // Add other letters (continue through Z) following the same structure.
 Z: [
        { name: "Zoophobia", desc: "A fear of animals." },
        { name: "Zellweger Syndrome", desc: "A rare genetic disorder affecting brain development." },
        { name: "Zonophobia", desc: "A general fear of certain zones or places." }
    ]
};

function showDiseases(letter) {
    const listContainer = document.getElementById("disease-list");
    listContainer.innerHTML = ""; // Clear previous diseases

    if (diseases[letter]) {
        diseases[letter].forEach(disease => {
            const button = document.createElement("button");
            button.textContent = disease.name;
            button.onclick = () => showDescription(disease.desc);
            listContainer.appendChild(button);
        });
    }

    document.getElementById("popup").style.display = "flex";
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
    document.getElementById("description").textContent = "";
}

function showDescription(description) {
    const descContainer = document.getElementById("description");
    descContainer.textContent = description;
}

function searchDiseases() {
    const query = document.getElementById("search-bar").value.toLowerCase();
    const buttons = document.querySelectorAll("#disease-list button");

    buttons.forEach(button => {
        if (button.textContent.toLowerCase().includes(query)) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });
}