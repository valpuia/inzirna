<?php

namespace Database\Seeders;

use App\Enums\MetaUrl;
use App\Models\MetaData;
use Illuminate\Database\Seeder;

class SeoMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seoMeta = [
            [
                'path' => MetaUrl::home,
                'title' => 'Lucky Cambodia Casino: Best Online Casino for Slots, Sports & Table Games',
                'description' => 'Discover top-tier slots, sports betting, live casino games, and exclusive bonuses at Lucky Cambodia Casino. Join today for the best gambling experience!',
                'keywords' => 'Lucky Cambodia Casino, best online casino Cambodia, slots, sports betting, live casino, online gambling Cambodia',
            ],

            [
                'path' => MetaUrl::slots,
                'title' => 'Play Exciting Slots at Lucky Cambodia Casino | Big Wins Await',
                'description' => 'Spin the reels of the most exciting slots at Lucky Cambodia Casino! Experience top games from leading providers and win big jackpots.',
                'keywords' => 'online slots Cambodia, jackpot slots, slot games, casino slots',
            ],

            [
                'path' => MetaUrl::lives,
                'title' => 'Live Casino at Lucky Cambodia: Play with Real Dealers',
                'description' => 'Immerse yourself in the real-time action of our live casino! Enjoy games like Baccarat, Blackjack, and Roulette with professional dealers.',
                'keywords' => 'live casino Cambodia, live dealer games, Baccarat, live Roulette',
            ],

            [
                'path' => MetaUrl::fishings,
                'title' => 'Play Popular Fishing Games at Lucky Cambodia Casino',
                'description' => 'Shoot for big rewards with our fishing games! Catch rare fish and win big prizes at Lucky Cambodia Casino.',
                'keywords' => 'fishing games Cambodia, online fishing games, shoot fish casino',
            ],

            [
                'path' => MetaUrl::sports,
                'title' => 'Bet on Sports at Lucky Cambodia Casino: Football, Basketball & More',
                'description' => 'Place your bets on a wide range of sports, including football, basketball, and tennis. Enjoy live betting with the best odds at Lucky Cambodia Casino.',
                'keywords' => 'sports betting Cambodia, live betting, football betting Cambodia',
            ],

            [
                'path' => MetaUrl::tables,
                'title' => 'Play Table Games at Lucky Cambodia Casino | Poker, Blackjack & More',
                'description' => 'Enjoy classic casino table games like Poker, Blackjack, and Roulette. Play your favorites and try to win big at Lucky Cambodia Casino.',
                'keywords' => 'table games Cambodia, Poker, Blackjack, online Roulette',
            ],

            [
                'path' => MetaUrl::arcades,
                'title' => 'Arcade Games at Lucky Cambodia Casino | Fun & Rewards',
                'description' => 'Dive into exciting arcade games and win great rewards at Lucky Cambodia Casino. Discover a new way to enjoy gambling online.',
                'keywords' => 'arcade games Cambodia, online arcade casino games',
            ],

            [
                'path' => MetaUrl::esport,
                'title' => 'Esports Betting at Lucky Cambodia Casino | Bet on Dota, CS & More',
                'description' => 'Bet on top esports games like Dota 2, CS, and League of Legends. Enjoy live esports betting at Lucky Cambodia Casino with competitive odds.',
                'keywords' => 'esports betting Cambodia, online esports bets, Dota 2 betting',
            ],

            [
                'path' => MetaUrl::promotions,
                'title' => 'Lucky Cambodia Casino Promotions: Welcome Bonuses & Free Spins',
                'description' => 'Check out our latest casino promotions! Get welcome bonuses, free spins, and loyalty rewards at Lucky Cambodia Casino.',
                'keywords' => 'casino promotions Cambodia, free spins, casino bonuses, welcome bonus',
            ],

            [
                'path' => MetaUrl::blogs,
                'title' => 'Lucky Cambodia Casino Blog: Latest Casino Tips, News & Updates',
                'description' => 'Stay updated with the latest news, casino tips, and game reviews on the Lucky Cambodia Casino blog. Get expert advice and insights.',
                'keywords' => 'casino blog Cambodia, casino news, gambling tips, casino updates',
            ],

            [
                'path' => MetaUrl::announcements,
                'title' => 'Announcements from Lucky Cambodia Casino | Latest News & Updates',
                'description' => 'Stay informed about the latest updates, events, and news at Lucky Cambodia Casino. Don\'t miss any important announcements.',
                'keywords' => 'casino announcements, casino updates Cambodia, online casino news',
            ],

            [
                'path' => MetaUrl::faqs,
                'title' => 'Lucky Cambodia Casino Q&A: Your Questions Answered',
                'description' => 'Find answers to frequently asked questions about Lucky Cambodia Casino, including account setup, deposits, and gameplay queries.',
                'keywords' => 'casino FAQs Cambodia, online casino help, gambling questions',
            ],

            [
                'path' => MetaUrl::responsibleGaming,
                'title' => 'Responsible Gaming at Lucky Cambodia Casino: Play Safely',
                'description' => 'Lucky Cambodia Casino is committed to promoting responsible gaming. Learn how to play safely and manage your gambling responsibly.',
                'keywords' => 'responsible gaming Cambodia, safe gambling, responsible gambling tips',
            ],

            [
                'path' => MetaUrl::gaming21,
                'title' => '21+ Only: Play Responsibly at Lucky Cambodia Casino',
                'description' => 'Lucky Cambodia Casino adheres to 21+ gaming regulations. Play responsibly and enjoy a safe gambling experience with us.',
                'keywords' => '21+ casino, responsible gambling Cambodia, age restrictions casino',
            ],
        ];

        MetaData::upsert($seoMeta, ['path']);
    }
}
