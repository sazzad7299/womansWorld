<?php


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\WebInfo;
use App\Models\ProductPhoto;
use App\Models\ProductRequest;

if (!function_exists('home_discounted_base_price')) {
    function home_discounted_base_price($product, $formatted = true)
    {
        $price = $product->price;
        $tax = 0;

        $discount_applicable = false;

        // if ($product->discount_start_date == null) {
        //     $discount_applicable = true;
        // } elseif (
        //     strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
        //     strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
        // ) {
        //     $discount_applicable = true;
        // }
            if($product->discount_type==1){
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 0) {
                $price -= $product->discount;
            }
        return $price;
    }
}

if (!function_exists('getProductphotos')) {
    function getProductphotos($product)
    {
       return $photos = ProductPhoto::where('product_id',$product->id)->get('photo');
    }
}
if(!function_exists('getproduct')){
     function getproduct($id)
    {
        $product = Product::where('id',$id)->first();
        return $product;
    }
}
if (!function_exists('discount_in_percentage')) {
    function discount_in_percentage($id)
    {
        $product = getproduct($id);
        if($product->discount_type==2){
            $price=$product->discount;
        }elseif($product->discount_type==1){
            $dp = (100*$product->discount)/$product->price;
            $price = round($dp);
        }else{
            $price =0;
        }
        return $price;

    }
}
if (!function_exists('sellPrice')) {
    function sellPrice($id)
    {
        $product = getproduct($id);
        if($product->discount_type==2){
           $price = round($product->price -($product->price * $product->discount/100));
        }elseif($product->discount_type==1){
            $price = $product->price - $product->discount;
        }else{
            $price =0;
        }
        return $price;
    }
}
// if (!function_exists('fucntionName')) {
//     function fucntionName(): array
//     {

//     }
// }

if (!function_exists('getStatus')) {
    function getStatus(): array
    {
        return [
            [
                'label' => 'Active',
                'value' => 1
            ],
            [
                'label' => 'Inactive',
                'value' => 0
            ],
        ];
    }
}
if (!function_exists('serialNumber')) {
    function serialNumber($data, $loop)
    {
        return $data->firstItem() + $loop->index;
    }
}
if (!function_exists('getinvoice')) {
    function getinvoice($id)
    {
        return  sprintf('INV-%07d', $id);
    }
}
if (! function_exists('format_date')) {
    function format_date($date)
    {
        return \Illuminate\Support\Carbon::parse($date)->format('jS F, Y');
    }
}
if (! function_exists('neworder')) {
    function neworder()
    {
        return Order::where('viewed', 0)->count();
    }
}
if (! function_exists('newrequest')) {
    function newrequest()
    {
        return ProductRequest::where('viewed', 0)->count();
    }
}
if (! function_exists('formatWithComma')) {
    function formatWithComma($number, $limit = null): string
    {
        return number_format($number, $limit, '.', ',');
    }
}

if (! function_exists('numberToWord')) {
    function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );

        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );

            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );

            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');

            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');

            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');

            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );

            foreach( $num_levels as $num_part )
            {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';

                if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
            {
                $commas = $commas - 1;
            }

            $words  = implode( ', ' , $words );

            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas )
            {
                $words  = str_replace( ',' , ' and' , $words );
            }

            return $words;
        }
        else if( ! ( ( int ) $num ) )
        {
            return 'Zero';
        }
        return '';
    }
}

