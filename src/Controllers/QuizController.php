<?php

namespace App\Controllers;

use App\Core\Http\Request;
use App\Core\JsonDB;
use App\Core\Template;

/**
 * Class QuizController
 *
 * Handles the quiz-related actions such as rendering the quiz page and processing quiz submissions.
 *
 * @package App\Controllers
 */
class QuizController
{
    /**
     * Renders the quiz view with the list of questions.
     *
     * @return void
     */
    public static function index(): void {
        Template::render('quiz', ['questions' => self::getQuestions()]);
    }

    /**
     * Processes the quiz submission, calculates the score, and updates the dashboard.
     *
     * @param Request $request The HTTP request containing the quiz submission data.
     * @return void
     */
    public static function submit(Request $request): void {
        $questions = JsonDB::connect('questions')->getData();
        $dashboard = JsonDB::connect('dashboard');

        $request->body['name'] = htmlspecialchars($request->body['name'] ?? '');

        if(!self::validateName($request->body['name'])) {
            Template::render('quiz', ['questions' => $questions, 'name_error' => 'Неправильное имя', 'submit' => $request->body]);
            return;
        }

        $score = 0;
        foreach ($questions as $question ) {
            $answer = array_find($request->body['answers'] ?? [], fn($answer, $key) => $key === $question['id']);
            $rightAnswers = array_filter($question['answers'], fn($answer) => $answer['correct']);

            if(array_all($rightAnswers, fn($rightAnswer) => in_array($rightAnswer['id'], $answer ?? []))) {
                $score++;
            }
        }
        $percentage = (int)($score / count($questions) * 100);
        $dashboard->addData([
            'name' => $request->body['name'],
            'score' => $score,
            'percentage' => $percentage,
        ]);

        Template::render('quiz_submit', ['name' => $request->body['name'], 'score' => $score, 'percentage' => $percentage]);
    }

    /**
     * Validates the provided name.
     *
     * @param string $name The name to validate.
     * @return bool True if the name is valid, false otherwise.
     */
    private static function validateName(string $name): bool {
        $name = htmlentities(trim($name));
        return strlen($name) >= 3 && strlen($name) <= 30;
    }

    /**
     * Retrieves the list of quiz questions from the database.
     *
     * @return array The list of quiz questions.
     */
    private static function getQuestions(): array {
        $connection = JsonDB::connect('questions');
        return $connection->getData();
    }
}