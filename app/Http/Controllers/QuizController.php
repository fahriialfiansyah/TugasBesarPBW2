<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Question;

class QuizController extends Controller
{
    public function index(){
        $content = DB::select('SELECT * FROM content');
        return view('admin.quiz.index', ['content' => $content]);
    }

    public function editContent(Request $request, $id){
        if ($_POST['action'] == 'Edit') {
            $content = $request->input('content');
            DB::update('UPDATE content SET introtext = ? WHERE id = ?',[$content, $id]);
            return redirect()->route('quiz.home');
        }
    }

    public function adminquizz(){
        $category = Category::all();
        return view('admin.quiz.questions', ['categories' => $category]);
    }

    public function Category($id){
        $category = DB::select('SELECT * FROM categories WHERE id = ?',[$id]);
        $quests = DB::select('SELECT * FROM questions WHERE questioncategory = ?',[$id]);
        return view('admin.quiz.questions.index',['category'=>$category, 'quests'=>$quests]);
    }

    public function editCategory($id){
        $category = DB::select('SELECT * FROM categories WHERE id = ?',[$id]);
        return view('admin.quiz.category.edit',['category'=>$category]);
    }

    public function editCategoryAction(Request $request ,$id){

        if ($_POST['action'] == 'Edit') {
            $category = $request->input('categoryname');
            DB::update('UPDATE categories SET categoryname = ? WHERE id = ?',[$category, $id]);
            return redirect()->route('admin/quiz/quiz.admin');
        }

        if ($_POST['action'] == 'Cancel') {
            return redirect()->route('admin/quiz/quiz.admin');
        }
    }

    public function deleteCategory($id) {
        DB::delete('DELETE FROM categories WHERE id = ?',[$id]);
        return redirect()->route('admin/quiz/quiz.admin');
    }

     public function createCategory(){
        return view('admin.quiz.category.create');
    }

    public function storeCategory(){
        if ($_POST['action'] == 'Create') {
            $category = new Category();
            $category->categoryname = request('categoryname');
            $category->save();
            return redirect()->route('admin/quiz/quiz.admin');
        }
        if ($_POST['action'] == 'Cancel') {
            return redirect()->route('admin/quiz/quiz.admin');
        }
    }

    public function Question(Category $categories){
        $quests = DB::select('SELECT * FROM questions WHERE questioncategory = ?',[$categories]);
        return view('admin.quiz.questions.details',['quests'=>$quests]);
    }


    public function createQuestion($id){
        $cats = DB::select('SELECT * FROM categories WHERE id = ?',[$id]);
        return view('admin.quiz.questions.create',['cats'=>$cats]);
    }

    public function storeQuestion(Request $request){

        if ($_POST['action'] == 'Create') {

            $question = Question::create([
                'questioncategory' => $request->questioncategory,
                'question' => $request->question,
                'answera' => $request->answera,
                'answerb' => $request->answerb,
                'answerc' => $request->answerc,
                'answerd' => $request->answerd,
                'correct' => $request->correct,
            ]);
            if ($question) {
                return redirect()
                    ->route('admin/quiz/quiz.create.category')
                    ->with([
                        'success' => 'New post has been created successfully'
                    ]);
            }
        }

        if ($_POST['action'] == 'Cancel') {
            return redirect()->route('admin/quiz/quiz.create.category');
        }
    }


    public function editQuestion($id){
        $quests = DB::select('SELECT * FROM questions WHERE id = ?',[$id]);
        return view('admin.quiz.questions.edit',['quests'=>$quests]);

    }

    public function editQuestionAction(Request $request ,$cid, $qid){

        if ($_POST['action'] == 'Edit') {
        $question = $request->input('question');
        $answera = $request->input('answera');
        $answerb = $request->input('answerb');
        $answerc = $request->input('answerc');
        $answerd = $request->input('answerd');
        $correct = $request->input('correct');
        DB::update('UPDATE questions SET question = ? , answera = ? , answerb = ? , answerc = ? , answerd = ? , correct = ? WHERE id = ?',[$question,$answera,$answerb,$answerc,$answerd,$correct,$qid]);
        return redirect()->route('quiz.category', [$cid]);
        }

        if ($_POST['action'] == 'Cancel') {
            return redirect()->route('quiz.category', [$cid]);
        }
    }

    public function deleteQuestion($cid, $qid) {
        DB::delete('DELETE FROM questions WHERE id = ?',[$qid]);
        return redirect()->route('quiz.category', [$cid]);
    }
}
