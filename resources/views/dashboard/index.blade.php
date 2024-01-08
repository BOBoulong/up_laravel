@extends('layout.backend')
@section('content')
<h2>Sales data this month</h2>
<div class='d-flex justify-content-between'>
    <div style="width: 700px;"><canvas id="myChart"></canvas></div>
    <div style="width: 350px;"><canvas id="myChart2"></canvas></div>
</div>

<div class="panel panel-default my-4">
    <div class="panel-heading">
        <h1>All Products</h1>
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th><div>{!! $product->id !!}</div></th>
                    <td>
                        <div>{!! $product->name !!}</div>
                    </td>
                    <td>
                        <div>{!! $product->description !!}</div>
                    </td>
                    <td>
                        <div>{!! $product->price !!}</div>
                    </td>
                    <td>
                        <div>{!! $categories[$product->category_id] !!}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Beverage', 'Snacks', 'Foods', 'Dry Foods', 'Books'],
      datasets: [{
        label: '# of Sales',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const ctx2 = document.getElementById('myChart2');

  const myChart = new Chart(ctx2, {
    type: 'pie', // Change the chart type to 'pie'
    data: {
        labels: ['Beverage', 'Snacks', 'Foods'],
        datasets: [{
            label: '# of Sales',
            data: [12, 19, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Sales Distribution'
            }
        }
    }
});
</script>
@endsection
