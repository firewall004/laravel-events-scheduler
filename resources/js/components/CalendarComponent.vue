<template>
    <div class="container">
		<full-calendar :events="scheduledEvents" locale="en"></full-calendar>
    </div>
</template>

<script>
	var demoEvents = [
		{
			title : 'Sunny Out of Office',
			start : '2021-06-25',
			end : '2021-06-27'
		},
		{
			title : 'Munny Out of Office',
			start : '2021-06-26',
			end : '2021-06-28'
		}
	];
	export default {
        data () {
			return {
			scheduledEvents: []
			}
		},
		created() {
			this.scheduledEvents = demoEvents;
		},
    }
</script>

<style scoped>
h3 {
    color: brown;
}
</style>
