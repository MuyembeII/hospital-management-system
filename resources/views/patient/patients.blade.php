@extends('template')

<section class="hero is-info">
<div class="hero-body">
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="search"/>
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-empire"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section class="container" id="p-list-container">
			<div class="columns">
				<div class="column is-3">
					<a class="button is-primary is-block is-alt is-large" href="#">Create New Patient</a>
					<br/>
					<a class="button is-primary is-block is-alt is-large" href="{{ route('main') }}">Back To Main</a>
					<aside class="menu">
						<p class="menu-label">
							Tags
						</p>
						<ul class="menu-list">
							<li><span class="tag is-primary is-medium ">Adults</span></li>
							<li><span class="tag is-link is-medium ">Paeds</span></li>
							<li><span class="tag is-light is-danger is-medium ">Males</span></li>
							<li><span class="tag is-dark is-medium ">Females</span></li>
						</ul>
					</aside>
				</div>
				<div class="column is-9">
					<div class="box content">
						<table class="table">
                          <thead>
                            <tr class="has-text-centered">
                              <th><abbr title="Client Number">Client No</abbr></th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Phone</th>
                              <th>Gender</th>
                              <th>D.O.B</th>
                              <th>action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>1</th>
                              <td>Martian Manhunter</td>
                              <td>Mars</td>
                              <td>0978123321</td>
                              <td>Male</td>
                              <td>23 Feb 1900</td>
                              <td>
                                <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th>2</th>
                              <td>John Constatine</td>
                              <td>London</td>
                              <td>0955999321</td>
                              <td>Male</td>
                              <td>23 Mar 1901</td>
                              <td>
                                <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th>3</th>
                              <td>Felix Frost</td>
                              <td>Hogwarts</td>
                              <td>0965956301</td>
                              <td>Male</td>
                              <td>05 Dec 1902</td>
                              <td>
                                 <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                              </td>
                            </tr>
                            <tr class="is-selected">
                              <th>4</th>
                              <td>Zatanna Zatarra</td>
                              <td>House of Fate</td>
                              <td>0977006301</td>
                              <td>Female</td>
                              <td>07 Sep 1906</td>
                              <td>Options</td>
                            </tr>
                            <tr>
                              <th>5</th>
                              <td>Harry Potter</td>
                              <td>Hogwarts</td>
                              <td>Female</td>
                              <td>0965956301</td>
                              <td>05 Dec 1902</td>
                              <td>
                                    <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <th>6</th>
                              <td>India Westbrooks</td>
                              <td>California</td>
                              <td>Female</td>
                              <td>0965956301</td>
                              <td>30 May 1999</td>
                              <td>
                                    <div class="action-buttons">
                                    <div class="control is-grouped">
                                        <a class="button is-small"><i class="fa fa-eye"></i></a>
                                        <a class="button is-small"><i class="fa fa-pen-to-square"></i></a>
                                        <a class="button is-small"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
					</div>
				</div>
			</div>
		</section>
