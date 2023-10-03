<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Page;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\WebInfo;
use App\Models\Category;
use App\Models\PayOption;
use App\Models\UserShipping;
use Illuminate\Http\Request;
use App\Models\ShippingOption;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SliderApiResource;
use App\Http\Controllers\Admin\PageController;
use App\Http\Resources\V1\ProductsApiResource;
use App\Http\Resources\V1\ProductBrandApiResource;
use App\Http\Resources\V1\CategoryParentApiResource;
use App\Models\Faq;

class HomeController extends Controller
{
    public function webinfo()
    {
        $webinfo = WebInfo::query()->first();
        return response()->json($webinfo,200);
    }

    public function homeproducts()
    {
        $homeProduct = ProductsApiResource::collection(Product::where('status', 1)->inRandomOrder()->limit(20)->get());
        return response()->json([
            'homeProduct' => $homeProduct,
        ], 200);
    }
    public function homecategories()
    {
        $category = CategoryParentApiResource::collection(Category::where('status', 1)->where('parent_id', Null)->limit(20)->get());
        return response()->json([
            'category' => $category,
        ], 200);
    }
    public function homebrands()
    {
        $brands = ProductBrandApiResource::collection(Brand::where('status', 1)->limit(20)->get());
        return response()->json([
            'brands' => $brands,
        ], 200);
    }
    public function homeoffers()
    {
        $offers = ProductsApiResource::collection(Product::where('status', 1)->where('discount_type', '!=', '0')->limit(20)->get());
        return response()->json([
            'offers' => $offers,
        ], 200);
    }
    public function homenewarrival()
    {
        $newarrival = ProductsApiResource::collection(Product::where('status', 1)
            ->where('new', 1)->latest()->limit(20)->get());
        return response()->json([
            'newarrival' => $newarrival,
        ], 200);
    }
    public function homefeatured()
    {
        $featured = ProductsApiResource::collection(Product::where('status', 1)->where('featured', 1)->latest()->limit(20)->get());
        return response()->json([
            'newarrival' => $featured,
        ], 200);
    }
    public function homepset()
    {
        $set = ProductsApiResource::collection(Product::where('status', 1)->where('p_set', 1)->latest()->limit(20)->get());
        return response()->json([
            'set' => $set,
        ], 200);
    }
    public function homeSlider()
    {
        $sliders = SliderApiResource::collection(Slider::latest()->limit(20)->get());
        return response()->json([
            'sliders' => $sliders,
        ], 200);
    }

    public function payoption()
    {
        $payoptions = PayOption::query()->where('status', 1)->select(['id', 'name', 'type', 'account'])->get();
        return response()->json($payoptions);
    }
    //shipping option
    public function shippingoptions()
    {
        $shipping = ShippingOption::query()->where('status', 1)->select(['id', 'title', 'details', 'cost'])->get();
        return response()->json($shipping);
    }

    public function usershipping()
    {
        $user_id = auth('sanctum')->user()->id;
        $shippinginfo = UserShipping::query()->where('user_id', $user_id)->select('name', 'address', 'city', 'apartment', 'zip', 'thana', 'phone')->first();
        return response()->json($shippinginfo);
    }
    //Search and Filter

    public function search(Request $request)
    {
        $query = Product::query();
        if ($request->has('category')) {
            $category = Category::with('children')->where('slug', $request->category)->first();

            if (isset($category)) {
                $categoryId = $category->id;
                $childIds = $category->children->pluck('id')->toArray();
                $childIds = array_merge([$categoryId], $childIds);

                $query->where('status', 1)->whereIn('category_id', $childIds);
            }
            // $query->where('category_id', $request->category_id);
        }
        // Filter by product name
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('type')) {
            switch ($request->type) {
                case 'new':
                    $query->where('status', 1)->where('new', 1);
                    break;
                case 'featured':
                    $query->where('status', 1)->where('featured', 1);
                    break;
                case 'perfume-set':
                    $query->where('status', 1)->where('p_set', 1);
                    break;
                case 'offer':
                    $query->where('status', 1)->where('discount_type', '!=', 0);
                    break;
                default:
                    break;
            }
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->where('status', 1)->whereBetween('price', [$request->min_price, $request->max_price]);
        }



        if ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->first();
            // return $brand;
            if (isset($brand)) {
                $query->where('status', 1)->where('brand_id', $brand->id);
            }
        }
        // Filter by Brand
        $getproduct = $query->paginate(20);
        if ($getproduct) {
            return ProductsApiResource::collection($getproduct);

        }
    }
    //Pages
    public function pages()
    {
        $pages = Page::query()->select(['name','slug'])->get();
        return response()->json($pages);
    }
    public function pagedetails($slug)
    {
        $page = Page::query()->where('slug',$slug)->first();
        return response()->json($page);
    }
    public function faqs()
    {
        $faqs = Faq::query()->select('id','question','answer')->get();
        return response()->json($faqs);
    }
}
