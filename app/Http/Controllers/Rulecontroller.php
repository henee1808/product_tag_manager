<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Models\Product;

class Rulecontroller extends Controller
{
    public function ruleList()
    {
        $rules = Rule::orderBy('id', 'desc')->get();
        return view('rule.rule-list', compact('rules'));
    }

     public function viewRuleList($id)
    {
        $rule = Rule::find($id);
        return view('rule.view-rule-list', compact('rule'));
    }

    public function addRule($id = 0)
    {
        $rule = $id ? Rule::find($id) : null;
        return view('rule.form', compact('rule','id'));
    }

    public function storeRule(Request $request, $id = 0)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'conditions' => 'nullable|array',
            'tags' => 'nullable|string',
        ]);

        $validated['conditions'] = $request->has('conditions') ? json_encode($request->conditions) : null;

        $rule = Rule::updateOrCreate(
            ['id' => $id],
            $validated
        );

         $message = 'Rule created successfully!';

        return redirect('/rule-list')->with('success', $message);
    }

   public function deleteRule($id)
    {
        $rule = Rule::find($id);
        if (!$rule) {
            return response()->json(['error' => 'Rule not found'], 404);
        }
        $rule->delete();
        return response()->json(['success' => 200]);
    }


    public function applyRule($id)
    {
        $rule = Rule::findOrFail($id);
        $conditions = json_decode($rule->conditions, true);
        $tags = $rule->tags;

        $products = Product::all();

        if ($products->isEmpty()) {
             return redirect()->back()->with('error', 'No products available to apply this rule.');
        }

        foreach ($products as $product) {
            $match = true;

            foreach ($conditions as $condition) {
                $field = $condition['field'];
                $operator = $condition['operator'];
                $value = $condition['value'];

                if (!isset($product->$field)) {
                    $match = false;
                    break;
                }

                switch ($operator) {
                    case '==':
                        if ($product->$field != $value) $match = false;
                        break;
                    case '>':
                        if ($product->$field <= $value) $match = false;
                        break;
                    case '<':
                        if ($product->$field >= $value) $match = false;
                        break;
                }

                if (!$match) break;
            }

            if ($match) {
                $existingTags = $product->tags ? json_decode($product->tags, true) : [];

                if (!is_array($existingTags)) {
                    $existingTags = [];
                }

                $existingTags[$rule->id] = $tags;

                $product->tags = json_encode($existingTags);
                $product->save();
            }
        }

       return redirect()->back()->with('success', $rule->name . ' applied successfully to matching ' . $product->name . '.');

}


}
