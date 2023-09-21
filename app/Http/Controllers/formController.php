<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function processForm(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'sort' => 'required|in:asc,desc',
            'limit' => 'required|integer|min:1',
        ]);

        $inputText = $validatedData['text'];
        $words = str_word_count($inputText, 1);

        $stopWords = file(base_path('/resources/views/stopwords.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Convert all words to lowercase for comparison
        $wordsToLower = array_map('strtolower', $words);

        $filteredWords = array_filter($wordsToLower, function ($word) use ($stopWords) {
            return !in_array($word, $stopWords);
        });

        $wordCounts = array_count_values($filteredWords);

        if ($validatedData['sort'] === 'desc') {
            arsort($wordCounts);
        } else {
            asort($wordCounts);
        }

        $limit = $validatedData['limit'];
        $limitedResults = array_slice($wordCounts, 0, $limit);

        $results = [];
        foreach ($limitedResults as $word => $frequency) {
            $results[] = ['word' => $word, 'frequency' => $frequency];
        }

        return view('process', [
            'results' => $results,
        ]);
    }
}
