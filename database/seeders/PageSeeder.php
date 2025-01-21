<?php

namespace Database\Seeders;

use App\Enums\MetaUrl;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'path' => MetaUrl::gaming21,
                'title' => '21+ RESPONSIBLE GAMING',
                'content' => <<<'BLADE'
                    <p>At Lucky Cambodia, one of our primary objectives is to ensure a responsible gaming environment. While it is extremely important for us to provide to our players, an online casino experience like no other, that is not enough. Being the providers of a powerful means of entertainment, we also have a duty: to prevent under-age individuals from accessing our online casino products.</p>
                    <p>&nbsp;</p>
                    <p>As an online gaming company aimed at bringing online casino entertainment to Cambodia, we fully understand the moral obligations and responsibilities that must be fulfilled by us. Lucky Cambodia is a completely legal online gaming site, licensed to host online casino games where Cambodia players may also play with full sanction of the law. However, it is important to us that youngsters and impressionable minds should not have access to our online gaming platform.</p>
                    <p>&nbsp;</p>
                    <p>Online casino is including various fun games, but it is also a pursuit that involves money actively changing hands among participants. This requires a level of maturity and level-headedness that younger people may often lack.</p>
                    <p>&nbsp;</p>
                    <p>The maturity factor also leads to the possibility of under-age individuals spending too much time playing online casino, as compared to players who know when to take a break. Thus, it is important to us that all players registered on Lucky Cambodia must be of age 21 years or above on the date of registration. This helps us ensure that our online gaming products do not serve to act as a distraction of any sort to those pursuing basic or undergraduate education.</p>
                    <p>&nbsp;</p>
                    <p>In order to enforce our policy of only allowing players above the age of 21 to play real money and play money casino games on Lucky Cambodia, we have put in some checks in place. Players may thus be requested for proof of age in order to continue. If such a request is received by you, you must send us a scanned copy of a government issued photo-ID which also mentions your DoB. In absence of such a response from your end, your account would have to be terminated.</p>
                    <p>&nbsp;</p>
                    <p>If you are a parent, and especially if your child accesses the Internet using the same computer system as you do, we urge you to exercise caution.</p>
                    <p>&nbsp;</p>
                    <p>The following points must be taken care of:</p>
                    <ul style="list-style-type: circle;">
                    <li>Do not use the save password feature. Use a strong password that is not easy to guess and does not contain any personal information such as your date of birth or name.</li>
                    <li>Do not leave the computer switched on if you are logged in to Lucky Cambodia, and in case that is unavoidable, please make sure that you log out.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>Our online casino site and software are not designed to attract minors.</p>
                BLADE
            ],

            [
                'path' => MetaUrl::responsibleGaming,
                'title' => 'RESPONSIBLE GAMING',
                'content' => <<<'BLADE'
                    <p>Responsible Gaming Policy</p>
                    <p>&nbsp;</p>
                    <p>Lucky Cambodia (the &ldquo;Company&rdquo;), the operator of this online casino website, (&ldquo;Website&rdquo;), strives to endorse responsible gaming as well as improving prevention and avoidance of excessive gaming. This Responsible Gambling Policy sets out not only the Company's commitments but also your responsibility to promote responsible gambling practices and minimize the negative effects of excessive gaming.</p>
                    <p>&nbsp;</p>
                    <p>Capitalized terms used herein but not defined in this Responsible Gaming Policy will have the meanings ascribed to them in the Website Terms and Conditions which are incorporated by reference into this Responsible Gaming Policy.</p>
                    <p>&nbsp;</p>
                    <p>We are committed to ensuring that you enjoy your gaming experience on our Website while remaining fully aware of the social and financial effects associated with excessive gaming. We offer and promote our skill games as an enjoyable entertainment activity and believe that gaming can remain this way only if you play responsibly and stay in control. This game involves an element of financial risk and may be addictive. Please play responsibly and at your own risk.</p>
                    <p>&nbsp;</p>
                    <p>WHAT YOU CAN DO:</p>
                    <p>If you choose to play on our Website, there are some general guidelines that can help make your playing experience safer, and reduce the risk that problems associated with excessive gaming can occur:</p>
                    <ul style="list-style-type: circle;">
                    <li>Purchase Play Money only with money that you can afford to spend.</li>
                    <li>Never purchase Play Money with money that you need for important or essential things such as food, rent, bills, or tuition.</li>
                    <li>Pre-plan your purchases and the time you will spend playing on the Website and stick to that limit. regardless of your performance.</li>
                    <li>Don't play when you are upset, tired, or depressed. It is difficult to make good decisions when you are feeling down.</li>
                    <li>Do not put off personal and other important tasks in order to play. Complete all your important tasks so that you can play with a free and calm mind.</li>
                    <li>Balance your playing with other activities. Find other forms of entertainment so playing does not become too big a part of your life.</li>
                    <li>Do not borrow money in order to make purchases on the Website.</li>
                    <li>Avoid using all of the Play Money purchased by you in a single game or session.</li>
                    <li>Take time outs and breaks regularly.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>UNDERAGE USERS:</p>
                    <p>The Company adopts a stringent policy against underage Users (i.e. Users aged under 21 years). To diminish the chance of false/undesired purchases and the possibility of the Website acting as a source of distraction to those pursuing basic or undergraduate education, we ask for identification and documentation if we suspect a User is under 21 years. The accounts of any Users identified to be underage and playing on the Website will be deactivated or deleted immediately.</p>
                    <p>&nbsp;</p>
                    <p>Although we dedicate a significant amount of time and resources to ensure there are no minors playing on the Website, we feel this prevention works best as a shared responsibility between us and the minor's parents/guardians. Provided below are a few tips that you can follow in order to ensure that minors, such as your children do not game on our Website:</p>
                    <ul style="list-style-type: circle;">
                    <li>Do not leave your PC or mobile device unattended if you are logged in to the Website.</li>
                    <li>Be sure to protect your PC and mobile device and set up password/credential control in order to use and access such devices.</li>
                    <li>Install/employ child protection software on your children's devices in order to prevent them from accessing the Website or any of the services we offer through the Website.</li>
                    <li>Use a strong password that is hard to decipher for your User Account. You can elect to have the Website software to not remember your password each time you log-in. If you have any concern that somebody else might attempt to access your User Account, you should not allow the software to remember your password.</li>
                    <li>Do not save your credit/debit card details while purchasing Play Money and please make sure that undesired purchases are avoided as all purchases made on the Website are irreversible.</li>
                    <li>Maintain close supervision of your User Account activity in order to limit unauthorized access to the Website</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>ACCOUNT CLOSURE REQUEST:</p>
                    <p>You can close your account at any time for any reason by simply contacting our Support Team. Please note that an account closed under our standard account closure mechanism can be reopened at any time by contacting our Support Team. However, if you feel you are at risk of developing an unhealthy addiction to gaming or believe you currently have an unhealthy addiction to gaming, we would advise that you consider self-exclusion - an explanation of self-exclusion is outlined in the below section (self-exclusion).</p>
                    <p>&nbsp;</p>
                    <p>SELF-EXCLUSION:</p>
                    <p>We offer a self-exclusion facility to help you if you feel that your gaming is affecting you negatively and you want assistance to help stop. At your request, we will prevent you from using your account for a specific period, as determined by you.</p>
                    <p>Should you wish to self-exclude yourself from using your account, you may contact our Support Team to request this. You will receive an email from the Support Team upon the self-exclusion request being operationalized on your User Account.</p>
                    <p>Once the period has lapsed, your account will be reopened. Please note that any self-exclusion request granted is irreversible for the duration of the time for which it was originally operationalized.</p>
                    <p>Entering into self-exclusion is a joint commitment from us and you. We will take reasonable steps to prevent you from re-opening your Account or opening new accounts with us. However, during the period of your exclusion, you must not attempt to re-open your account or to try and open new accounts on our Website.</p>
                    <p>&nbsp;</p>
                    <p>BLOCK BY COMPANY:</p>
                    <p>The Company may at its discretion, temporarily place a block on your access to your User Account in case it detects any abnormal or unusual activity such as extremely large and frequent purchases of Play Money being made on your User Account Website. In such instances, the Company shall also communicate with you to make you aware of the potential financial implications of your activities. You will receive an email from the Support Team upon the Company placing any blocks on your User Account.</p>
                    <p>The Company may also place a temporary block on your User Account in the event the User's Know Your Customer (KYC) information has not been provided to the Company or is outdated until you provide appropriate documentation to the Company in order for the Company to verify your KYC details.</p>
                    <p>&nbsp;</p>
                    <p>CONSEQUENCES OF EXCLUSION:</p>
                    <p>Please note that any self-exclusion/block/closure placed by the Company will apply to your User Account as a whole and that you will be prevented from playing any and all games available on the Website during any self-exclusion/blockage/closure period.</p>
                    <p>You will be automatically unregistered from any tournaments that begin after your User Account is self-excluded/blocked/closed. In addition, you will not receive any marketing emails or newsletters from us regarding the Website for the period of self-exclusion/blockage/closure.</p>
                    <p>&nbsp;</p>
                    <p>DEPOSIT LIMITS:</p>
                    <p>By default, the company permits users to deposit a min of KHR 4000 &amp; max of KHR 200,000/- in aggregate, over a period of 24hrs. in the event you wish to modify your deposit limits. You may do so using the Responsible Gaming Self Limitation tool.</p>
                    <p>&nbsp;</p>
                    <p>QUERIES SELF EXCLUSION:</p>
                    <p>If you believe that playing games might be a hindrance to your life rather than a form of entertainment, we want to help you. First, please view the following questions:</p>
                    <ul style="list-style-type: circle;">
                    <li>Has casino caused you to lose time from important activities in your daily life?</li>
                    <li>Have you ever indebted yourself financially to fund your casino bankroll?</li>
                    <li>Have you ever considered self-destruction or suicide as a result of your playing?</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>WHAT YOU CAN DO TO HELP YOURSELF?</p>
                    <p>Identify and reduce the risks</p>
                    <p>If you choose to play online, some general guidelines can help make your playing experience safer and reduce the risk of problems occurring.</p>
                    <ul style="list-style-type: circle;">
                    <li>Play for entertainment and not as a way of making money. Casino should be played recreation and only with funds that you can afford to lose.</li>
                    <li>Play stakes you're comfortable with, playing on higher stakes may not help you recover losses.</li>
                    <li>Don't play when you are upset, tired or depressed, It is difficult to make good decisions when you are feeling down.</li>
                    <li>Balance your play with other activities. Find other forms of entertainment so that playing does not become a big part of your life.</li>
                    <li>Do not play when you are intoxicated.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>SETTING LIMITS</p>
                    <p>We offer you the option to set different Responsible Gaming limits to help you play responsibly. You can set these limits by contacting support.</p>
                    <p>You may set limits for&nbsp;</p>
                    <ul style="list-style-type: circle;">
                    <li>You may choose to completely stop deposits on your account but continue to play free rolls and withdrawals any winnings from the same.</li>
                    <li>You may have your account locked which would prevent you from playing on the website. Once the limit is been set, it is irreversible for 7 days.</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>&nbsp;WHAT WE CAN DO TO HELP YOU?</p>
                    <p>Age verification Any player who has provided dishonest or inaccurate information regarding his/her true age may have all winnings forfeited.</p>
                    <ul style="list-style-type: circle;">
                    <li>Every person signing up for a new account confirms that they are at least 21 years of age.&nbsp;This confirms everybody that everyone playing on our websites is over the age of 21 years.</li>
                    <li>We do not target underage players with our marketing and advertising. It is neither good business nor consistent with our personal and corporate values to attract underage players.</li>
                    </ul>
                BLADE
            ],
        ];

        Page::upsert($pages, ['path']);
    }
}
