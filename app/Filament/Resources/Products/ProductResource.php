<?php

namespace App\Filament\Resources\Products;

use App\Filament\Resources\Products\Pages\CreateProduct;
use App\Filament\Resources\Products\Pages\EditProduct;
use App\Filament\Resources\Products\Pages\ListProducts;
use App\Filament\Resources\Products\Schemas\ProductForm;
use App\Filament\Resources\Products\Tables\ProductsTable;
use App\Models\Product;
use App\Models\ProductVariant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\Repeater;
use Filament\Resources\RelationManagers\RelationManager;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_alat';

    public static function form(Schema $schema): Schema
        {
        return ProductForm::configure($schema)
            ->inlineLabel() // Semua label akan berada di samping input
            ->components([
                Section::make('Informasi Alat')
                    ->description('Detail utama produk rental')
                    ->schema([
                        TextInput::make('nama_alat')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public') // Pastikan ini ada
                            ->directory('products')
                            ->visibility('public')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('deskripsi')
                            ->rows(3),
                    ]),

                Section::make('Varian & Harga')
                    ->schema([
                        Repeater::make('variants')
                            ->relationship('variants')
                            ->inlineLabel(false)
                            ->schema([
                                TextInput::make('size')
                                    ->label('Ukuran')
                                    ->required(),
                                TextInput::make('harga_per_hari')
                                    ->numeric()
                                    ->required()
                                    ->prefix('Rp'),
                                TextInput::make('stok_total')
                                    ->numeric()
                                    ->required()
                                    ->label('Stok'),
                            ])
                            ->columns(3)
                            ->itemLabel(fn (array $state): ?string => $state['size'] ?? null),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
        {
        return ProductsTable::configure($table)
            ->query(\App\Models\ProductVariant::query()->with('product'))
            ->columns([
                Tables\Columns\ImageColumn::make('product.image')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public'),
                Tables\Columns\TextColumn::make('product.nama_alat')
                    ->label('Nama Alat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('size')
                    ->label('Ukuran')
                    ->badge(),
                Tables\Columns\TextColumn::make('harga_per_hari')
                    ->label('Harga/Hari')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stok_total')
                    ->label('Stok')
                    ->sortable(),
            ])
            ->actions([
            // Menggunakan EditAction standar (lebih praktis)
                Action::make('edit_product')
                    ->label('Edit Produk')
                    ->url(fn (\App\Models\ProductVariant $record): string => 
                        static::getUrl('edit', ['record' => $record->product_id])
                    ),
            ])
            ->groups([
                Tables\Grouping\Group::make('product.nama_alat')
                    ->label('Nama Produk')
                    ->collapsible(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
