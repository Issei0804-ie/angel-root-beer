<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtractedText extends Model
{
    use HasFactory;

    protected $fillable = ['file_id', 'extracted_text'];
    protected $guarded = ['id'];
    public function file(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
